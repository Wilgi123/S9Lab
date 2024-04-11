import subprocess
def get_ipconfig():
    result=subprocess.run(['ipconfig'],capture_output=True,text=True)
    return result.stdout
print(get_ipconfig())