import networkx as nx
import matplotlib.pyplot as plt

# Create a graph object
G = nx.Graph()

# Add nodes representing devices
G.add_node("Router1")
G.add_node("Router2")
G.add_node("Switch1")
G.add_node("PC1")
G.add_node("PC2")

# Add edges representing connections between devices
G.add_edge("Router1", "Switch1")
G.add_edge("Switch1", "PC1")
G.add_edge("Switch1", "PC2")
G.add_edge("Router1", "Router2")

# Generate the layout of the graph
pos = nx.spring_layout(G)

# Draw the graph
nx.draw(G, pos, with_labels=True, node_size=800, edge_color="grey", arrows=True, font_weight="bold", font_size=10)

# Set title and turn off axis
plt.title("Network Topology")
plt.axis("off")

# Show the plot
plt.show()
