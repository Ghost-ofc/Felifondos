import mysql.connector
from mysql.connector import Error
import base64
import os
import glob
from PIL import Image

def conectar():
    try:
        conexion = mysql.connector.connect(
            host='127.0.0.1',
            database='felifondos',
            user='root',
            password='ghostofc99'
        )
        if conexion.is_connected():
            print('Conectado a la base de datos')
            return conexion
    except Error as e:
        print(f'Error: {e}')
        return None

def cerrar_conexion(conexion):
    if conexion.is_connected():
        conexion.close()
        print('Conexión cerrada')

def obtener_resolucion(imagen_path):
    try:
        with Image.open(imagen_path) as img:
            ancho, alto = img.size
            return ancho, alto
    except Exception as e:
        print(f"Error al obtener la resolución de la imagen: {e}")
        return None

def insertar_imagen(conexion, ruta_imagen):
    try:
        nombre = os.path.basename(ruta_imagen)
        nombre_sin_extension = os.path.splitext(nombre)[0]  # Elimina la extensión del nombre

        print(f'Insertando imagen {nombre_sin_extension}...')
        print(f'Ruta: {ruta_imagen}...')

        with open(ruta_imagen, 'rb') as imagen_file:
            imagen_base64 = base64.b64encode(imagen_file.read()).decode('utf-8')

        peso = len(imagen_base64) / 1024
        peso = round(peso, 2)
        print(f'Peso: {peso} KB')
        resolucion = obtener_resolucion(ruta_imagen)
        resolucion = f"{resolucion[0]}x{resolucion[1]}"
        cursor = conexion.cursor()

        consulta = ("INSERT INTO fondo (nombre, imagen, peso, categoria, resolucion) "
                    "VALUES (%s, %s, %s, %s, %s)")

        datos = (nombre_sin_extension, imagen_base64, peso, 'Animado', resolucion)

        cursor.execute(consulta, datos)
        conexion.commit()

        print('Imagen insertada correctamente')

    except Error as e:
        print(f'Error al insertar la imagen: {e}')

def listar_imagenes_en_carpeta(carpeta):
    extensiones_permitidas = ["jpg"]  # Agrega cualquier extensión adicional que desees permitir
    ext = "*"
    imagenes = [archivo for archivo in glob.glob(os.path.join(carpeta, f"*.{ext}")) for ext in extensiones_permitidas]
    print(f"Se encontraron {len(imagenes)} imágenes en la carpeta {carpeta}")
    return imagenes

def subir_imagenes_en_carpeta(conexion, carpeta):
    imagenes = listar_imagenes_en_carpeta(carpeta)

    for imagen in imagenes:
        insertar_imagen(conexion, imagen)

if __name__ == "__main__":
    carpeta_imagenes = r"img\Animado" 

    conexion_db = conectar()

    if conexion_db:
        subir_imagenes_en_carpeta(conexion_db, carpeta_imagenes)
        cerrar_conexion(conexion_db)