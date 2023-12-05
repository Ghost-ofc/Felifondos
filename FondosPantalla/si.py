import mysql.connector

# Conectarse a la base de datos
conexion = mysql.connector.connect(
    host="localhost",
    user="tu_usuario",
    password="tu_contraseña",
    database="tu_base_de_datos"
)

# Crear un cursor para ejecutar consultas
cursor = conexion.cursor()

# Ejecutar una consulta SELECT
consulta = "SELECT * FROM fondo"
cursor.execute(consulta)

# Obtener los resultados de la consulta
resultados = cursor.fetchall()

# Imprimir los resultados
for fila in resultados:
    print(fila)

# Cerrar el cursor y la conexión
cursor.close()
conexion.close()
