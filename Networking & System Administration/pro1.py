import subprocess

return_code = subprocess.call(["python", "--version"])

if return_code == 0:

    print("Command executed successfully.")

else:

    print("Command failed with return code", return_code)