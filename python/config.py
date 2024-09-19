import os

class Config:
    SECRET_KEY = os.environ.get('SECRET_KEY') or 'your_secret_key'
    MYSQL_HOST = 'localhost'
    MYSQL_USER = 'codevoyage_system' 
    MYSQL_PASSWORD = 'hHitenaxUv'
    MYSQL_DB = 'codevoyage_system'