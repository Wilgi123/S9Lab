import Pyro4

# Connect to the Pyro server
prime_checker = Pyro4.Proxy("PYRONAME:prime.checker")

# Input number to check for primality
num = int(input("Enter a number to check if it's prime: "))

# Call the remote method to check if the number is prime
is_prime = prime_checker.is_prime(num)

# Print the result
if is_prime:
    print(f"{num} is prime.")
else:
    print(f"{num} is not prime.")
