## New Repository

`<your-clone-url>` Is addres near tag `git clone` in project information and `<your-project-name>` is same as `slug` in project information.

Clone this repository to your local copy on disk, make changes and push them back.

```bash
git clone <your-clone-url>
cd <your-project-name>

# Edit any file

git add .
git commit -"some changes"
git push origin master
```

## Existing repository

Open shell and create repository for your new project

```bash
cd /path/to/my-existing-project

git init
git add .
git commit -m "new repository"
git remote add origin <your-clone-url>
git push origin master
```