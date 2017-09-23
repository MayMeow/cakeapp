# Buckets

Buckets are folders without quota. You will pay for average usage of disk space per month

## Upload

With Rsync

```bash
rsync -av --info=progress2 local-folder rsync://<server>:<port>/bucket/<bucket-id>
```

## Git Support

Initialize bucket with your git repository files. Edit it and commit changes back to server.