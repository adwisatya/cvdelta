echo off 
set comment=%1
set branch=%2
git add -A
git commit -m %comment%
git push origin %branch%