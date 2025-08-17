import sys
import math
import random
import time
from dataclasses import dataclass
from typing import List, Tuple

from OpenGL.GL import *
from OpenGL.GLU import *
from OpenGL.GLUT import *


# ------------------------------
# Window and world configuration
# ------------------------------
WINDOW_WIDTH = 1000
WINDOW_HEIGHT = 800
ASPECT_RATIO = WINDOW_WIDTH / WINDOW_HEIGHT
CLEAR_COLOR = (0.05, 0.05, 0.07, 1.0)

WORLD_HALF_SIZE = 20.0
GRID_CELL_SIZE = 1.0
BOUNDARY_HEIGHT = 2.5

# Camera
DEFAULT_FOV_DEG = 60.0
CHEAT_FOV_DEG = 75.0
CAMERA_ORBIT_RADIUS = 30.0
CAMERA_MIN_HEIGHT = 3.0
CAMERA_MAX_HEIGHT = 20.0

# Player
PLAYER_MOVE_SPEED = 6.0
PLAYER_ROTATE_SPEED_DEG = 120.0
PLAYER_RADIUS = 0.6
PLAYER_GUN_LENGTH = 1.4
PLAYER_GUN_RADIUS = 0.10
PLAYER_HEAD_RADIUS = 0.35

# Enemies
NUM_ENEMIES = 5
ENEMY_MOVE_SPEED = 2.6
ENEMY_BASE_RADIUS = 0.6
ENEMY_PULSE_RATE = 2.0
ENEMY_RESPAWN_MIN_DISTANCE = 8.0

# Bullets
BULLET_SPEED = 22.0
BULLET_SIZE = 0.20
BULLET_MAX_TRAVEL = 80.0
BULLET_COOLDOWN_SEC = 0.15

# Game rules
STARTING_LIFE = 5
MAX_MISSED = 10

# Cheat mode
CHEAT_ROTATE_SPEED_DEG = 180.0
CHEAT_LOS_DEG_TOL = 8.0
CHEAT_LOS_MAX_DISTANCE = 24.0


# ------------------------------
# Utility helpers
# ------------------------------

def clamp(value: float, min_value: float, max_value: float) -> float:
    return max(min_value, min(max_value, value))


def yaw_to_dir(yaw_deg: float) -> Tuple[float, float]:
    """Return (dx, dz) forward direction for yaw in degrees.
    yaw=0 faces -Z; positive yaw rotates toward +X.
    """
    r = math.radians(yaw_deg)
    dx = math.sin(r)
    dz = -math.cos(r)
    return dx, dz


def dir_to_yaw(dx: float, dz: float) -> float:
    """Return yaw degrees for a direction vector. Inverse of yaw_to_dir."""
    return math.degrees(math.atan2(dx, -dz))


def angle_diff_deg(a: float, b: float) -> float:
    d = (a - b + 180.0) % 360.0 - 180.0
    return d


def length2(x: float, z: float) -> float:
    return math.hypot(x, z)


def normalize2(x: float, z: float) -> Tuple[float, float]:
    L = length2(x, z)
    if L <= 1e-8:
        return 0.0, 0.0
    return x / L, z / L


# ------------------------------
# Data models
# ------------------------------
@dataclass
class Bullet:
    x: float
    y: float
    z: float
    yaw_deg: float
    distance_travelled: float = 0.0


@dataclass
class Enemy:
    x: float
    z: float
    pulse_t: float = 0.0


# ------------------------------
# Global game state
# ------------------------------
player_x: float = 0.0
player_z: float = 0.0
player_yaw_deg: float = 0.0
player_life: int = STARTING_LIFE
player_lie_deg: float = 0.0

score: int = 0
missed: int = 0

bullets: List[Bullet] = []
enemies: List[Enemy] = []

# Inputs (continuous)
key_down = {
    'w': False,
    's': False,
    'a': False,
    'd': False,
}

arrow_state = {
    'left': False,
    'right': False,
    'up': False,
    'down': False,
}

# Camera state
first_person: bool = False
camera_orbit_deg: float = 35.0
camera_height: float = 8.0

# Cheat mode
cheat_mode: bool = False
cheat_auto_camera: bool = False

# Timing
_last_time: float = time.time()
_next_can_shoot_time: float = 0.0

# Rendering
_current_fov: float = DEFAULT_FOV_DEG


# ------------------------------
# Shape drawing (immediate mode)
# ------------------------------

def draw_cuboid(w: float, h: float, d: float) -> None:
    x = w * 0.5
    y = h * 0.5
    z = d * 0.5
    glBegin(GL_QUADS)
    # Front
    glVertex3f(-x, -y, -z)
    glVertex3f( x, -y, -z)
    glVertex3f( x,  y, -z)
    glVertex3f(-x,  y, -z)
    # Back
    glVertex3f(-x, -y,  z)
    glVertex3f(-x,  y,  z)
    glVertex3f( x,  y,  z)
    glVertex3f( x, -y,  z)
    # Left
    glVertex3f(-x, -y, -z)
    glVertex3f(-x,  y, -z)
    glVertex3f(-x,  y,  z)
    glVertex3f(-x, -y,  z)
    # Right
    glVertex3f( x, -y, -z)
    glVertex3f( x, -y,  z)
    glVertex3f( x,  y,  z)
    glVertex3f( x,  y, -z)
    # Top
    glVertex3f(-x,  y, -z)
    glVertex3f( x,  y, -z)
    glVertex3f( x,  y,  z)
    glVertex3f(-x,  y,  z)
    # Bottom
    glVertex3f(-x, -y, -z)
    glVertex3f(-x, -y,  z)
    glVertex3f( x, -y,  z)
    glVertex3f( x, -y, -z)
    glEnd()


def draw_cylinder(radius: float, height: float, slices: int = 20) -> None:
    half = height * 0.5
    glBegin(GL_QUAD_STRIP)
    for i in range(slices + 1):
        theta = 2.0 * math.pi * (i / slices)
        cx = math.cos(theta)
        cz = math.sin(theta)
        glVertex3f(radius * cx, -half, radius * cz)
        glVertex3f(radius * cx,  half, radius * cz)
    glEnd()
    glBegin(GL_TRIANGLE_FAN)
    glVertex3f(0.0, half, 0.0)
    for i in range(slices + 1):
        theta = 2.0 * math.pi * (i / slices)
        cx = math.cos(theta)
        cz = math.sin(theta)
        glVertex3f(radius * cx, half, radius * cz)
    glEnd()
    glBegin(GL_TRIANGLE_FAN)
    glVertex3f(0.0, -half, 0.0)
    for i in range(slices + 1):
        theta = -2.0 * math.pi * (i / slices)
        cx = math.cos(theta)
        cz = math.sin(theta)
        glVertex3f(radius * cx, -half, radius * cz)
    glEnd()


def draw_sphere(radius: float, slices: int = 20, stacks: int = 16) -> None:
    for i in range(stacks):
        lat0 = math.pi * (-0.5 + i / stacks)
        z0 = math.sin(lat0) * radius
        r0 = math.cos(lat0) * radius

        lat1 = math.pi * (-0.5 + (i + 1) / stacks)
        z1 = math.sin(lat1) * radius
        r1 = math.cos(lat1) * radius

        glBegin(GL_QUAD_STRIP)
        for j in range(slices + 1):
            lng = 2 * math.pi * (j / slices)
            x = math.cos(lng)
            y = math.sin(lng)
            glVertex3f(x * r0, y * r0, z0)
            glVertex3f(x * r1, y * r1, z1)
        glEnd()


# ------------------------------
# Drawing the scene
# ------------------------------

def draw_grid_and_boundaries() -> None:
    glColor3f(0.25, 0.25, 0.28)
    glBegin(GL_LINES)
    t = int((WORLD_HALF_SIZE * 2) / GRID_CELL_SIZE)
    start = -WORLD_HALF_SIZE
    for i in range(t + 1):
        a = start + i * GRID_CELL_SIZE
        glVertex3f(a, 0.0, -WORLD_HALF_SIZE)
        glVertex3f(a, 0.0,  WORLD_HALF_SIZE)
        glVertex3f(-WORLD_HALF_SIZE, 0.0, a)
        glVertex3f( WORLD_HALF_SIZE, 0.0, a)
    glEnd()

    glColor3f(0.50, 0.15, 0.15)
    glBegin(GL_LINES)
    steps = int((WORLD_HALF_SIZE * 2) / GRID_CELL_SIZE)
    for i in range(steps + 1):
        a = -WORLD_HALF_SIZE + i * GRID_CELL_SIZE
        glVertex3f(-WORLD_HALF_SIZE, 0.0, a)
        glVertex3f(-WORLD_HALF_SIZE, BOUNDARY_HEIGHT, a)
        glVertex3f( WORLD_HALF_SIZE, 0.0, a)
        glVertex3f( WORLD_HALF_SIZE, BOUNDARY_HEIGHT, a)
        glVertex3f(a, 0.0, -WORLD_HALF_SIZE)
        glVertex3f(a, BOUNDARY_HEIGHT, -WORLD_HALF_SIZE)
        glVertex3f(a, 0.0,  WORLD_HALF_SIZE)
        glVertex3f(a, BOUNDARY_HEIGHT,  WORLD_HALF_SIZE)
    glEnd()


def draw_player() -> None:
    glPushMatrix()
    glTranslatef(player_x, 0.0, player_z)
    if is_game_over():
        glRotatef(player_lie_deg, 0.0, 0.0, 1.0)
    glRotatef(player_yaw_deg, 0.0, 1.0, 0.0)

    glColor3f(0.1, 0.6, 0.9)
    glPushMatrix()
    glTranslatef(0.0, 0.75, 0.0)
    draw_cuboid(1.0, 1.5, 0.6)
    glPopMatrix()

    glColor3f(0.95, 0.85, 0.75)
    glPushMatrix()
    glTranslatef(0.0, 1.6, 0.0)
    draw_sphere(PLAYER_HEAD_RADIUS, slices=18, stacks=14)
    glPopMatrix()

    glColor3f(0.15, 0.15, 0.15)
    glPushMatrix()
    glTranslatef(0.0, 1.2, -0.1)
    glRotatef(90.0, 0.0, 1.0, 0.0)
    draw_cylinder(PLAYER_GUN_RADIUS, PLAYER_GUN_LENGTH, slices=18)
    glPopMatrix()

    glPopMatrix()


def draw_enemy(e: Enemy, pulse_scale: float) -> None:
    glPushMatrix()
    glTranslatef(e.x, 0.0, e.z)
    glColor3f(0.9, 0.2, 0.2)
    glPushMatrix()
    glTranslatef(0.0, ENEMY_BASE_RADIUS * pulse_scale, 0.0)
    draw_sphere(ENEMY_BASE_RADIUS * pulse_scale, slices=16, stacks=12)
    glPopMatrix()

    glColor3f(1.0, 0.4, 0.4)
    glPushMatrix()
    glTranslatef(0.0, ENEMY_BASE_RADIUS * 2.0 * pulse_scale, 0.0)
    draw_sphere(ENEMY_BASE_RADIUS * 0.6 * pulse_scale, slices=16, stacks=12)
    glPopMatrix()

    glPopMatrix()


def draw_bullet(b: Bullet) -> None:
    glPushMatrix()
    glTranslatef(b.x, b.y, b.z)
    glRotatef(b.yaw_deg, 0.0, 1.0, 0.0)
    glColor3f(1.0, 0.9, 0.2)
    draw_cuboid(BULLET_SIZE * 2.0, BULLET_SIZE * 0.7, BULLET_SIZE * 0.7)
    glPopMatrix()


# ------------------------------
# Game mechanics
# ------------------------------

def is_game_over() -> bool:
    return player_life <= 0 or missed >= MAX_MISSED


def reset_game() -> None:
    global player_x, player_z, player_yaw_deg, player_life, player_lie_deg
    global score, missed, bullets, enemies
    global cheat_mode, cheat_auto_camera

    player_x = 0.0
    player_z = 0.0
    player_yaw_deg = 0.0
    player_life = STARTING_LIFE
    player_lie_deg = 0.0

    score = 0
    missed = 0
    bullets = []
    enemies = []
    cheat_mode = False
    cheat_auto_camera = False

    for _ in range(NUM_ENEMIES):
        enemies.append(spawn_enemy_far_from_player())


def spawn_enemy_far_from_player() -> Enemy:
    while True:
        side = random.randint(0, 3)
        a = random.uniform(-WORLD_HALF_SIZE + 1.0, WORLD_HALF_SIZE - 1.0)
        if side == 0:
            x, z = -WORLD_HALF_SIZE + 1.0, a
        elif side == 1:
            x, z = WORLD_HALF_SIZE - 1.0, a
        elif side == 2:
            x, z = a, -WORLD_HALF_SIZE + 1.0
        else:
            x, z = a, WORLD_HALF_SIZE - 1.0
        if length2(x - player_x, z - player_z) >= ENEMY_RESPAWN_MIN_DISTANCE:
            return Enemy(x=x, z=z, pulse_t=random.uniform(0.0, math.tau))


def try_fire_bullet(now_time: float) -> None:
    global _next_can_shoot_time
    if is_game_over():
        return
    if now_time < _next_can_shoot_time:
        return
    bx = player_x
    by = 1.25
    bz = player_z
    bullets.append(Bullet(x=bx, y=by, z=bz, yaw_deg=player_yaw_deg))
    _next_can_shoot_time = now_time + BULLET_COOLDOWN_SEC


def check_cheat_line_of_sight() -> bool:
    if not enemies:
        return False
    best = 9999.0
    for e in enemies:
        dx = e.x - player_x
        dz = e.z - player_z
        dist = length2(dx, dz)
        if dist > CHEAT_LOS_MAX_DISTANCE:
            continue
        target_yaw = dir_to_yaw(dx, dz)
        diff = abs(angle_diff_deg(target_yaw, player_yaw_deg))
        if diff < best:
            best = diff
    return best <= CHEAT_LOS_DEG_TOL


def update_game(dt: float) -> None:
    global player_x, player_z, player_yaw_deg, player_lie_deg
    global camera_orbit_deg, camera_height, _current_fov

    if is_game_over():
        player_lie_deg = clamp(player_lie_deg - 90.0 * dt, -90.0, 0.0)
    else:
        if key_down['a']:
            player_yaw_deg = (player_yaw_deg + PLAYER_ROTATE_SPEED_DEG * dt) % 360.0
        if key_down['d']:
            player_yaw_deg = (player_yaw_deg - PLAYER_ROTATE_SPEED_DEG * dt) % 360.0

        move_dir = 0.0
        if key_down['w']:
            move_dir += 1.0
        if key_down['s']:
            move_dir -= 1.0
        if abs(move_dir) > 0.0:
            dx, dz = yaw_to_dir(player_yaw_deg)
            step = PLAYER_MOVE_SPEED * dt * (1.0 if move_dir > 0 else -1.0)
            nx = player_x + dx * step
            nz = player_z + dz * step
            margin = PLAYER_RADIUS + 0.2
            nx = clamp(nx, -WORLD_HALF_SIZE + margin, WORLD_HALF_SIZE - margin)
            nz = clamp(nz, -WORLD_HALF_SIZE + margin, WORLD_HALF_SIZE - margin)
            player_x, player_z = nx, nz

        if cheat_mode:
            player_yaw_deg = (player_yaw_deg + CHEAT_ROTATE_SPEED_DEG * dt) % 360.0
            if check_cheat_line_of_sight():
                try_fire_bullet(time.time())

    if arrow_state['left']:
        camera_orbit_deg = (camera_orbit_deg + 60.0 * dt) % 360.0
    if arrow_state['right']:
        camera_orbit_deg = (camera_orbit_deg - 60.0 * dt) % 360.0
    if arrow_state['up']:
        camera_height = clamp(camera_height + 10.0 * dt, CAMERA_MIN_HEIGHT, CAMERA_MAX_HEIGHT)
    if arrow_state['down']:
        camera_height = clamp(camera_height - 10.0 * dt, CAMERA_MIN_HEIGHT, CAMERA_MAX_HEIGHT)

    if cheat_mode and cheat_auto_camera and first_person:
        _current_fov = CHEAT_FOV_DEG
    else:
        _current_fov = DEFAULT_FOV_DEG

    update_enemies(dt)
    update_bullets(dt)


def update_enemies(dt: float) -> None:
    global player_life
    for i, e in enumerate(enemies):
        e.pulse_t += dt * ENEMY_PULSE_RATE
        dx = player_x - e.x
        dz = player_z - e.z
        dirx, dirz = normalize2(dx, dz)
        step = ENEMY_MOVE_SPEED * dt
        e.x += dirx * step
        e.z += dirz * step
        e.x = clamp(e.x, -WORLD_HALF_SIZE + ENEMY_BASE_RADIUS, WORLD_HALF_SIZE - ENEMY_BASE_RADIUS)
        e.z = clamp(e.z, -WORLD_HALF_SIZE + ENEMY_BASE_RADIUS, WORLD_HALF_SIZE - ENEMY_BASE_RADIUS)

        dist = length2(player_x - e.x, player_z - e.z)
        if dist <= (PLAYER_RADIUS + ENEMY_BASE_RADIUS * 0.9):
            if not is_game_over():
                player_life -= 1
                enemies[i] = spawn_enemy_far_from_player()


def update_bullets(dt: float) -> None:
    global score, missed
    alive: List[Bullet] = []
    for b in bullets:
        dx, dz = yaw_to_dir(b.yaw_deg)
        b.x += dx * BULLET_SPEED * dt
        b.z += dz * BULLET_SPEED * dt
        b.distance_travelled += BULLET_SPEED * dt

        hit_enemy_index = -1
        for i, e in enumerate(enemies):
            dist = length2(b.x - e.x, b.z - e.z)
            if dist <= (ENEMY_BASE_RADIUS * 0.9):
                hit_enemy_index = i
                break
        if hit_enemy_index != -1:
            score += 1
            enemies[hit_enemy_index] = spawn_enemy_far_from_player()
            continue

        if (
            abs(b.x) > WORLD_HALF_SIZE + 0.5
            or abs(b.z) > WORLD_HALF_SIZE + 0.5
            or b.distance_travelled > BULLET_MAX_TRAVEL
        ):
            missed += 1
            continue

        alive.append(b)
    bullets[:] = alive


# ------------------------------
# OpenGL / GLUT setup and loop
# ------------------------------

def apply_camera_and_projection() -> None:
    glMatrixMode(GL_PROJECTION)
    glLoadIdentity()
    gluPerspective(_current_fov, max(0.1, ASPECT_RATIO), 0.1, 200.0)

    glMatrixMode(GL_MODELVIEW)
    glLoadIdentity()

    if first_person:
        eye_y = 1.6
        dx, dz = yaw_to_dir(player_yaw_deg)
        eye_x = player_x
        eye_z = player_z
        center_x = eye_x + dx * 2.0
        center_y = eye_y
        center_z = eye_z + dz * 2.0
        gluLookAt(eye_x, eye_y, eye_z, center_x, center_y, center_z, 0.0, 1.0, 0.0)
    else:
        r = CAMERA_ORBIT_RADIUS
        ang = math.radians(camera_orbit_deg)
        eye_x = math.sin(ang) * r
        eye_z = math.cos(ang) * r
        eye_y = camera_height
        gluLookAt(eye_x, eye_y, eye_z, 0.0, 0.0, 0.0, 0.0, 1.0, 0.0)


def display() -> None:
    glClear(GL_COLOR_BUFFER_BIT | GL_DEPTH_BUFFER_BIT)
    apply_camera_and_projection()

    draw_grid_and_boundaries()

    for e in enemies:
        s = 0.85 + 0.25 * math.sin(e.pulse_t)
        draw_enemy(e, s)

    draw_player()

    for b in bullets:
        draw_bullet(b)

    glutSwapBuffers()


def idle() -> None:
    global _last_time
    now = time.time()
    dt = max(0.0, min(0.05, now - _last_time))
    _last_time = now

    update_game(dt)
    glutPostRedisplay()


# ------------------------------
# Input handlers
# ------------------------------

def keyboard_down(key: bytes, _x: int, _y: int) -> None:
    global cheat_mode, cheat_auto_camera
    k = key.decode('utf-8').lower()
    if k in key_down:
        key_down[k] = True
    elif k == 'c':
        cheat_mode = not cheat_mode
    elif k == 'v':
        if cheat_mode:
            cheat_auto_camera = not cheat_auto_camera
    elif k == 'r':
        if is_game_over():
            reset_game()


def keyboard_up(key: bytes, _x: int, _y: int) -> None:
    k = key.decode('utf-8').lower()
    if k in key_down:
        key_down[k] = False


def special_down(key: int, _x: int, _y: int) -> None:
    if key == GLUT_KEY_LEFT:
        arrow_state['left'] = True
    elif key == GLUT_KEY_RIGHT:
        arrow_state['right'] = True
    elif key == GLUT_KEY_UP:
        arrow_state['up'] = True
    elif key == GLUT_KEY_DOWN:
        arrow_state['down'] = True


def special_up(key: int, _x: int, _y: int) -> None:
    if key == GLUT_KEY_LEFT:
        arrow_state['left'] = False
    elif key == GLUT_KEY_RIGHT:
        arrow_state['right'] = False
    elif key == GLUT_KEY_UP:
        arrow_state['up'] = False
    elif key == GLUT_KEY_DOWN:
        arrow_state['down'] = False


def mouse(button: int, state: int, _x: int, _y: int) -> None:
    global first_person
    if state != GLUT_DOWN:
        return
    if button == GLUT_LEFT_BUTTON:
        try_fire_bullet(time.time())
    elif button == GLUT_RIGHT_BUTTON:
        first_person = not first_person


def reshape(w: int, h: int) -> None:
    global WINDOW_WIDTH, WINDOW_HEIGHT, ASPECT_RATIO
    WINDOW_WIDTH = max(1, w)
    WINDOW_HEIGHT = max(1, h)
    ASPECT_RATIO = WINDOW_WIDTH / WINDOW_HEIGHT
    glViewport(0, 0, WINDOW_WIDTH, WINDOW_HEIGHT)


def init_gl() -> None:
    glClearColor(*CLEAR_COLOR)
    glEnable(GL_DEPTH_TEST)


def main() -> None:
    random.seed()
    reset_game()

    glutInit(sys.argv)
    glutInitDisplayMode(GLUT_DOUBLE | GLUT_RGB | GLUT_DEPTH)
    glutInitWindowSize(WINDOW_WIDTH, WINDOW_HEIGHT)
    glutCreateWindow(b"Bullet Frenzy - PyOpenGL")

    init_gl()

    glutDisplayFunc(display)
    glutIdleFunc(idle)
    glutKeyboardFunc(keyboard_down)
    glutKeyboardUpFunc(keyboard_up)
    glutSpecialFunc(special_down)
    glutSpecialUpFunc(special_up)
    glutMouseFunc(mouse)
    glutReshapeFunc(reshape)

    glutMainLoop()


if __name__ == "__main__":
    main()