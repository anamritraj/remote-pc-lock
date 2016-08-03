import subprocess
import update_url
import time
import os
dir_path = str(os.path.dirname(os.path.realpath(__file__)))

# Starting local php server
subprocess.Popen([dir_path+"\\start-server.bat"])

# Starting ngrok tunnel
subprocess.Popen([dir_path+"\\start-ngrok.bat"])

# Waiting for ngrok to assign URL
time.sleep(5)

# Get currently assigned URL
lock_url = update_url.getURL.get_url()

# Updating the URL in database
update_url.update_url(os.environ['username'], os.environ['password'], lock_url)