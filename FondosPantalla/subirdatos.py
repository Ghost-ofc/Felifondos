import mysql.connector

def cargar_sql(nombre_archivo, host, usuario, contrasena, base_datos):
    try:
        # Conectarse a la base de datos
        conexion = mysql.connector.connect(
            host=host,
            user=usuario,
            password=contrasena,
            database=base_datos
        )

        if conexion.is_connected():
            print(f"Conectado a la base de datos: {base_datos}")

            # Crear un cursor
            cursor = conexion.cursor()

            # Leer el archivo SQL
            with open(nombre_archivo, 'r') as archivo_sql:
                script_sql = archivo_sql.read()

            # Ejecutar el script SQL
            cursor.execute(script_sql)
            conexion.commit()

            print("Importación exitosa")

    except mysql.connector.Error as e:
        print(f"Error: {e}")

    finally:
        # Cerrar la conexión
        if conexion.is_connected():
            cursor.close()
            conexion.close()
            print("Conexión cerrada")

# Configuración de la conexión y archivo SQL
archivo_sql = r"C:\Users\USER\Desktop\Felifondos.sql"
host_db = 'mysql-ecobike.alwaysdata.net'
usuario_db = 'amewllte_mabelbd'
contrasena_db = 'Siete@47814s'
nombre_db = 'amewllte_felifondos'

# Llamar a la función para cargar el archivo SQL
cargar_sql(archivo_sql, host_db, usuario_db, contrasena_db, nombre_db)
print("Fin del programa")