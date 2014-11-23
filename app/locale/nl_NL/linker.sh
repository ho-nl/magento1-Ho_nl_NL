#!/usr/bin/env sh

declare -a csva=($(find lib -type f -name \*.csv))

case "$1" in

    (c|create|mk|make)

        for f in ${csva[@]}; do
            test -h $(basename $f) || ln -s $f $(basename $f)
        done
        ;;

    (d|del|delete)

        find . -type d \! -name . -prune -o -type l -print
        ;;

    (l|ls|list)

        find . -type l -printf '%p -> %l\n'
        ;;

    (v|val|validate)

        for f in ${csva[@]}; do
            test -L $(basename $f) &&\
                printf "\n✓ found %s" ${f} ||\
                printf "\n$(tput setaf 1)✗$(tput sgr0) broke %s" ${f}
        done
        ;;

esac



