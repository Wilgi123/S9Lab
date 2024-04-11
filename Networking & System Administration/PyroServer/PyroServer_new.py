import Pyro4

class MyServer(object):
    @Pyro4.expose
    def greet(self, name):
        return "Hello, {}!".format(name)

# Create an instance of the server class
server_instance = MyServer()

# Register the server instance with Pyro
daemon = Pyro4.Daemon()
url = daemon.register(server_instance)

# Print server url
print("Server url:", url)

# Register server with Pyro nameserver
ns = Pyro4.locateNS()
ns.register("MyServer", url)

# Start the Pyro server
print("Server is ready:")
daemon.requestLoop()
