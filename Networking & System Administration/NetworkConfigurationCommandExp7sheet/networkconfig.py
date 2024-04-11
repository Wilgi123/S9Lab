class NetworkDevice:
    def __init__(self,name,ip):
        self.name=name
        self.ip=ip
        self.connections=[]
    
    def connect_to(self,other_device):
        self.connections.append(other_device)
        other_device.connections.append(self)

    def __str__(self):
        return f"{self.name} ({self.ip})"

router=NetworkDevice("Router","192.168.6.226")
switch=NetworkDevice("Switch","192.168.6.225")
pc1=NetworkDevice("PC1","192.168.6.227")
pc2=NetworkDevice("PC2","192.168.6.223")

router.connect_to(switch)
router.connect_to(pc1)
switch.connect_to(pc2)

print("Network Configuration")
print(f"{router} is connected to : ")
for device in router.connections:
    print(f" .{device}")

print(f"{switch} is connected to : ")
for device in switch.connections:
    print(f" .{device}")