import Pyro4

ns = Pyro4.locateNS()
url = ns.lookup("MyServer")
server = Pyro4.Proxy(url)

name = input("Enter your name: ")
message = server.greet(name)  # Fix typo from great to greet
print("Message from server:", message)
