# This is a simple module to fetch data from MySQL db.
# python -m pip install mysql-connector //run this command if you face import error
# references: https://www.w3schools.com/python/python_mysql_getstarted.asp

import mysql.connector
import traceback


def get_data(query: str):
    """
         @query: sql query that needs to be executed.

         returns the data being executed in "List" format
        """

    try:

        # Setup the connection.
        # Pass your database details here
        mydb = mysql.connector.connect(
            host="localhost",
            user="root",
            passwd="",
            database="popcornweb"
        )

        # set up the cursor to execute the query
        cursor = mydb.cursor()
        cursor.execute(query)
        result = cursor.fetchone()

        # fetch all rows from the last executed statement using `fetchall method`.
        # for x in result:
        #     print(x)
        return result
    except:
        print("Error occured while connecting to database or fetching data from database. Error Trace: {}".format(
            traceback.format_exc()))
        return []
def get_data_all(query: str):
    """
         @query: sql query that needs to be executed.

         returns the data being executed in "List" format
        """

    try:

        # Setup the connection.
        # Pass your database details here
        mydb = mysql.connector.connect(
            host="localhost",
            user="root",
            passwd="",
            database="popcornweb"
        )

        # set up the cursor to execute the query
        cursor = mydb.cursor()
        cursor.execute(query)
        result = cursor.fetchall()

        # fetch all rows from the last executed statement using `fetchall method`.
        # for x in result:
        #     print(x)
        return result
    except:
        print("Error occured while connecting to database or fetching data from database. Error Trace: {}".format(
            traceback.format_exc()))
        return []

# test the file before integrating with the bot by uncommenting the below line.
# print(get_data("SELECT * FROM kiemtra;"))
