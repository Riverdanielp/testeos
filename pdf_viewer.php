<?php
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=luafitness.pdf");
readfile("docs/luafitness.pdf");