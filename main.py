import sqlite3 as sql
from flask import Flask,render_template,request

app = Flask(__name__, template_folder ='../templates'  )

con= sql.connect('student_Information.db')

print("Connected")

@app.route('/input', methods = ['POST','GET'])
def input():
    if request.method == 'POST':
        try:
            SID = request.form['Student_ID_Number']
            Date_Of_Verification = request.form['DATE_of_REGISTRATION']
            Items = request.form['Item_Details']
            Brand = request.form['Brand']
            Color = request.form['Color']
            Serial_umber = request.form['Serial_umber']

            with sql.connect("student_Information.db") as con:

                cur = con.cursor()

                cur.execute("INSERT INTO devices (SID,Date_Of_Verification,Items,Brand,Color,Serial_umber) VALUES (?,?,?,?,?,?)",(SID,Date_Of_Verification,Items,Color,Brand,Serial_umber))

                msg = "Recorded Successfully added"

        except:
            con.rollback()
            msg="error in inserting data"


        finally:
            return render_template("/", msg=msg)
            con.close()
    return render_template("itemrgtr.html")

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=8000)