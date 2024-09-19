import sys
import logging
sys.path.insert(0, '/var/customers/webs/codevoyage/python')
from app import app as application

logging.basicConfig(stream=sys.stderr)