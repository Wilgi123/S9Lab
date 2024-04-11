import shutil
# Source directory to be copied
source_dir = r'C:\Users\ajcemca\Desktop\wilgi_dbms'
# Destination directory where the data tree will be copied
destination_dir = r'C:\Users\ajcemca\Desktop\N&SA_wilgi'
shutil.copytree(source_dir, destination_dir,dirs_exist_ok=True)  # copy sub directories too; ok
   