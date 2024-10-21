import sys
import logging
sys.path.insert(0, '/var/customers/webs/gfn/lf05')
from app import app as application

logging.basicConfig(stream=sys.stderr)