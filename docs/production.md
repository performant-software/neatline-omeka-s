# Production
###### Development instructions for neatline-omeka-s

#### Create a GitHub release
In the neatline-omeka-s GitHub repository, go to the releases page and select "Draft a new release". Enter a new tag to create the release. Tags should be named as `vx.x.x`. For example: `v1.0.0`.

#### Create the Neatline plugin
On your development machine, `cd` into the neatline-omeka-s directory. Using the following commands to generate the plugin zip:

```
cd path/to/neatline-omeka-s
./scripts/release.sh
```

You will be prompted to enter your tag name (created in step 1) and a temporary directory that will be used to generate the zip file from the repositories. You must have access to both the neatline-omeka-s and neatline-spa repositories.

#### Attach plugin to release

Back in GitHub, attach the generated `Neatline.zip` to the release as a binary and publish the release.