from flask import Flask, render_template
import sqlite3



app = Flask(__name__)

@app.route('/')
def hello_world():
    # membuka koneksi ke database
    conn = sqlite3.connect('log.db')

    # membuat kursor untuk mengeksekusi perintah SQL
    cursor = conn.cursor()

    # mengeksekusi perintah SQL untuk membaca data dari tabel
    cursor.execute('SELECT * FROM log')

    # membaca hasil dari eksekusi perintah SQL
    result = cursor.fetchall()

    # menutup koneksi ke database
    conn.close()

    # menampilkan hasil pembacaan data
    return render_template("index.html", rows=result)

if __name__ == '__main__':
    app.run(debug=True)

