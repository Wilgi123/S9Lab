import subprocess
def pathping(host):
    result=subprocess.run(['pathping',host],capture_output=True,text=True)
    return result.stdout
host_to_pathping='google.com'
print(pathping(host_to_pathping))