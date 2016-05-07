#!/bin/bash

username=$1
password=$2
salt=$(sudo getent shadow $username | cut -d$ -f3)
epassword=$(sudo getent shadow $username | cut -d: -f2)
match=$(python -c 'import crypt; print crypt.crypt("'"${password}"'", "$6$'${salt}'")')
output="$([ ${match} == ${epassword} ] && echo "yes" || echo "no")"
echo $output