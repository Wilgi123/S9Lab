import paramiko

client = paramiko.SSHClient()


client.set_missing_host_key_policy(paramiko.AutoAddPolicy())


client.connect('192.168.122.1', username='student', password='student')


stdin, stdout, stderr = client.exec_command('ls')


print(stdout.read().decode())

client.close()