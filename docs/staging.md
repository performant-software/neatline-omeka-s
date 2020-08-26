# Staging
###### Staging instructions for neatline-omeka-s

## Setup

#### LAMP
The staging server is setup very similar to the development instructions described in the [developement](development.md) README. Use the Linux platform equivalent commands to setup a typical LAMP stack. Instead of httpd, we'll use Apache2 with a virtual host on port 80.

Also, apt no longer has a Linux distribution for MySQL 5.6 (which is required for Neatline). See the [README](MYSQL.md) on Linux MySQL instructions for more information.

#### Git
In addition to the LAMP stack, the staging server is also setup as a Git server. This will allow developers to push changes to a remote repo and use Git hooks to update and deploy (much like Heroku).

Create the repository, we'll use a "bare" repository to allow pushes.
```
git init --bare neatline-omeka-s.git
```

Create the working directory, this will be empty until a push is made.
```
git clone neatline-omeka-s.git neatline-omeka-s
```

Setup the hooks directory
```
git configre core.hooksPath /root/neatline-omeka-s/hooks
```

Git will use the hooks feature to deploy the app after a push is made. See [post-recieve](../hooks/post-receive) hook.

## Deployment

After the initial setup of the staging server has been done, deployments can be done directly via Github.

First, add the remote respository:
```
git remote add staging root@142.93.114.34:neatline-omeka-s.git
```

Then, push your changes:
```
git push staging <local-branch>:<remote-branch>
git push staging my_awesome_feature:master
```