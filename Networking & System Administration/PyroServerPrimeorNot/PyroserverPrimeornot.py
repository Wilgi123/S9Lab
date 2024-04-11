import Pyro4

@Pyro4.expose
class PrimeChecker:
    def is_prime(self, num):
        if num <= 1:
            return False
        elif num <= 3:
            return True
        elif num % 2 == 0 or num % 3 == 0:
            return False
        i = 5
        while i * i <= num:
            if num % i == 0 or num % (i + 2) == 0:
                return False
            i += 6
        return True

# Create a Pyro daemon
daemon = Pyro4.Daemon()

# Register the PrimeChecker class with the Pyro daemon
uri = daemon.register(PrimeChecker)

# Start a Pyro nameserver
ns = Pyro4.locateNS()
ns.register("prime.checker", uri)

# Print the URI for clients to connect to
print("Ready. Object uri =", uri)

# Run the Pyro daemon
daemon.requestLoop()
