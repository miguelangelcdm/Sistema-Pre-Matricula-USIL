# Sistema de Pre-Matricula USIL

1. Hecho con PHP Nativo + Javascript + Mysql 8.0.32
2. Para levantar el proyecto en dev:
   1. Levantar servidor apache **SOLO**(con **LARAGON** preferiblemente)
   2. Colocar las credenciales correctas de la BD en **index.php** y **conexion.php** en la carpeta modelo
   3. Listo
---
#### El objetivo de este sistema es facilitar las labores de las coordinaciones de las carreras de ingeniería de Sistemas de Información, software y ciencia de datos para con anticipación planificar lo que será la gestión de bloques de cursos en el semestre venidero. Además, permitirá a los alumnos tomar sus precauciones y evitar problemas de falta de comunicación que podrían llevarlo a no llevar un determinado curso.
---
- Los alumnos registrarán los cursos que proyectan llevar el ciclo que se aproxima. Adicionalmente, podrán ver los bloques que se están abriendo y poder tener una idea de si se abrirá o no en base a la cantidad de alumnos que ya se estén anotando.
- La coordinación de las carreras podrá de esta manera, tener una idea clara de los cursos que una gran cantidad de alumnos haya mostrado intención de llevar e incluso en que turno (Mañana, tarde o noche)
- Hasta la versión 1.0, la inscripción de los alumnos a los cursos deberá ser reiniciada manualmente cada ciclo, para que la información se genera nuevamente sea solo la del ciclo que se aproxima.
- El sistema fue diseñado para que en la versión actual(1.0), los alumnos ingresen con código de alumno respectivo tanto para el usuario y la contraseña.
---
### Historial de versiones:

#### 1.0
- Login con autenticación por usuario y contraseña
- Tres dropdowns para filtrar por carrera, malla y ciclo
- Vistas de prematricula y listado de bloques con alumnos
- Funciones básicas de prematricula de alumnos en cursos:
  - Prematricularse a muchos cursos
  - Eliminar cursos individualmente
  - Comprobar en cualquier momento en que cursos esta pre-matriculandose
- Filtrado de datos a través de Jquery Datatables
- Posibilidad de escoger turnos para cada curso
- Contador de créditos a un máximo de 22, con validación para evitar superar el límite.
- Botones de navegación para "Home" que dirige al menu principal y para cerrar la sesión
#### 1.x (Coming Soon)
- Contador de alumnos por curso en el listado de Cursos en la vista bloques
- Cambio de contraseña
- Diseño responsive
- Roles y permisos
---
El sistema fue, es y pretende ser desarrollado entera y voluntariamente por alumnos de la carrera de ingeniería de Sistemas de información de la Universidad San Ignacio de Loyola.
