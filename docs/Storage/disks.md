# Disks

Disks are storage vith quota based on what is maximum capacity. If you need move, backup or delete all files you have to 
move disk file (for example VHDX) or delete it.

## Create disk

```bash
# Windows Hyper-V
New-VHD -Path K:\<disk-name>.vhdx -SizeBytes 50GB #or any other size
```

## Setup and mount disk

Disk UID you can see on this page under description

```bash
# Linux
# Format disk with EXT4
sudo mkfs.ext4 -F /dev/disk/by-id/<your-disk-id>
 
# and mount it
sudo mount -o discard,defaults /dev/disk/by-id/your-disk-id /cloud/disks/<disk-UID>
```

To ensure disk will be mounted after server restart you will need to update fstab

```bash
echo /dev/disk/by-id/<your-disk-id> /cloud/disk/<disk-UID> ext4 defaults,nofail,discard 0 0 | sudo tee -a /etc/fstab
```