import subprocess
import update_url
import getURL
import time
import os

# dir_path = str(os.path.dirname(os.path.realpath(__file__)))
# dir_path = dir_path + "\\..\\batch-files"

# # Starting local php server
# subprocess.Popen([dir_path+"/start-server.bat"], shell=True)

# # Starting ngrok tunnel
# subprocess.Popen([dir_path+"/start-ngrok.bat"], shell=True)

# # Waiting for ngrok to assign URL
# time.sleep(5)

# Get currently assigned URL
lock_url = getURL.get_url()
print(lock_url)
# Updating the URL in database
update_url.update_url(os.environ['username'], os.environ['password'], lock_url)