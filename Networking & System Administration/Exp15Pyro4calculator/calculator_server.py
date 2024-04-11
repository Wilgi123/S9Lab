import Pyro4

class Calculator(object):
    @Pyro4.expose
    def add(self, x, y):
        return x + y

    @Pyro4.expose
    def subtract(self, x, y):
        return x - y

    @Pyro4.expose
    def multiply(self, x, y):
        return x * y

    @Pyro4.expose
    def divide(self, x, y):
        if y == 0:
            raise ValueError("Cannot divide by zero")
        return x / y

# Create an instance of the calculator class
calculator_instance = Calculator()

# Register the calculator instance with Pyro
daemon = Pyro4.Daemon()
uri = daemon.register(calculator_instance)

# Print server URI
print("Server URI:", uri)

# Register server with Pyro nameserver
ns = Pyro4.locateNS()
ns.register("calculator", uri)

# Start the Pyro server
print("Server is ready:")
daemon.requestLoop()
