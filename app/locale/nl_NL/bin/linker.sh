#!/usr/bin/env sh

# system
declare -a closure=()

function ret ()
{
    closure=("${${all:-$@}[@]}")
    echo $closure

}

function fn ()
{
    prefix="printf "
    while [ "${1+defined}" ]; do cmd+="$1 "; shift; done    
    printf $cmd
    unset cmd prefix
}

fn hello -f -b -x --foo bar

# less portable than typeset but who uses those few vte it involves anyway
# and we can get benefits of oneliner declare and set of arrays
declare -a csvs=(${result:=$(find lib -type f -name '*.csv')})

# Convenient and prevents accidental closing of vte or ssh connection
function die () {
    printf "✗ script interrupt signal received, reason: %s (process %s)" ${1:-none} $$
    kill -INT $$
}

# I'm so used to zsh but I want to keep this script portable
function print () {

    # loop over function arguments, ensure first positional argument is used
    # by popping the stack on each iteration using shift
    while [ "${1+defined}" ]; do
      cmd+="$1 "
      shift
    done    
    echo "printf " $cmd
    unset cmd
}

function charseq ()
{
    echo ${1?Need an argument} | grep -o .""
}

print "Hallo wereld" "vandaag" Jansen Mevr

print

declare -a foo=($(charseq "einde"))

echo ${foo[@]}



