/*
	Документация по Stimulus: https://stimulus.hotwired.dev/reference/controllers
*/

import { Application } from "@hotwired/stimulus";

import TestingController from "./controllers/testing/testing-controller";

window.Stimulus = Application.start();

/* Тестирование */
Stimulus.register("testing", TestingController);
