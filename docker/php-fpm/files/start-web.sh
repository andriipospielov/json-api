#!/usr/bin/env bash
set -e


chown www-data:www-data -R public var

$@