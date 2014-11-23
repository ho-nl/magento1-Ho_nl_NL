#!/usr/bin/env sh

# The use of symlinks under windows operating systems is problematic
# and requires some technical knowledge and persistence to resolve
# this issue in a sufficient matter. Hence publishing these files
# as symlinks is not very portable. For now, it does facilitate safe
# and easier organization of the files in terms of translation prio
# of files (first core, then most often used? to discuss with Ho_nl)
# Hence we provide the command to erase all symlinks and copy all files
my=./$0
declare -a csva=($(find lib -type f -name \*.csv))

case "$1" in

    (c|copy)
        $my ls      
        #find . -type l -mtime -0 -exec mv -t . {} +

        ;;

    (mk|make)

        for f in ${csva[@]}; do
            test -h $(basename $f) || ln -s $f $(basename $f)
        done
        ;;

    (d|del|delete)

        find . -type d \! -name . -prune -o -type l -print
        ;;

    (l|ls|list)

        find . -type l -printf 'moved %l → %p\n'
        ;;

    (v|val|validate)

        for f in ${csva[@]}; do
            test -L $(basename $f) &&\
                printf "\n✓ found %s" ${f} ||\
                printf "\n$(tput setaf 1)✗$(tput sgr0) broke %s" ${f}
        done
        ;;

esac



