#!/bin/bash
set -ex
# Specify the directory path
directory="src/docs"

# Iterate over all files in the directory
for file in "$directory"/*; do
    # Check if the current item is a file
    if [[ -f "$file" ]]; then
        # Perform desired operations on the file
        echo "$file"

        # Get the filename without extension
        filename=$(basename "$file")
        filename_without_extension="${filename%.*}"

        cd ../devdocs/
        git checkout main
        git branch $filename_without_extension
        git checkout $filename_without_extension
        cp ../doc-blaster/src/docs/$filename .
        git add $filename
        git commit -m "Add $filename. "
        git push --set-upstream origin $filename_without_extension
        git checkout main
        git branch -D $filename_without_extension
        cd ../doc-blaster/
    fi
done