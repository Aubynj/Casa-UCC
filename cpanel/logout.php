<?php
	#Let destroy the session
	session_start();
	session_unset();
	session_destroy();

	header("Location: index");
