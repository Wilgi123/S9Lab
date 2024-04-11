import shutil

# Source file to be renamed
source_file = r'C:\Users\ajcemca\Desktop\Roshan\Client.class'
# New name for the file
new_name = 'NewClient.class'
# Destination path with the new name
destination_path = r'C:\Users\ajcemca\Desktop\N&SA_wilgi' + '\\' + new_name
# Move the file to the destination directory with the new name
shutil.move(source_file, destination_path)

