$(document).ready(function() {
	(function() {
		
		var tasker = {
			init: function() {
				this.cacheDom();
				this.bindEvents();
				this.evalTasklist();
			},
			cacheDom: function() {
				this.taskInput = document.getElementById("input-task");
				this.addBtn = document.getElementById("add-task-btn");
				this.tasklist = document.getElementById("tasks");
				this.tasklistChildren = this.tasklist.children;
				this.errorMessage = document.getElementById("error");
			},
			bindEvents: function() {
				this.addBtn.onclick = this.addTask.bind(this);
				this.taskInput.onkeypress = this.enterKey.bind(this);
			},
			evalTasklist: function() {
				var item, chkBox, delBtn;
				for (item = 0; item < this.tasklistChildren.length; item += 1) {
					chkBox = this.tasklistChildren[item].getElementsByTagName("input")[0];
					chkBox.onclick = this.completeTask.bind(this, this.tasklistChildren[item], chkBox);
					delBtn = this.tasklistChildren[item].getElementsByTagName("button")[0];
					delBtn.onclick = this.delTask.bind(this, item);
				}
			},
			render: function() {
				var taskLi, taskChkbx, taskVal, taskBtn, taskTrsh;


				taskLi = document.createElement("li");
				taskLi.setAttribute("class", "task");

				taskChkbx = document.createElement("input");
				taskChkbx.setAttribute("type", "checkbox");

				taskVal = document.createTextNode(this.taskInput.value);

				taskBtn = document.createElement("button");

				taskTrsh = document.createElement("span");
				taskTrsh.setAttribute("class", "fa fa-trash");

				taskBtn.appendChild(taskTrsh);

				taskLi.appendChild(taskChkbx);
				taskLi.appendChild(taskVal);
				taskLi.appendChild(taskBtn);

				this.tasklist.appendChild(taskLi);

			},
			completeTask: function(item, chkBox) {
				if (chkBox.checked) {
					item.className = "task completed";
				} else {
					this.incompleteTask(item);
				}
			},
			incompleteTask: function(item) {
				item.className = "task";
			},
			enterKey: function(event) {
				if (event.keyCode === 13 || event.which === 13) {
					this.addTask();
				}
			},
			addTask: function() {
				var value = this.taskInput.value;
				this.errorMessage.style.display = "none";

				if (value === "") {
					this.error();
				} else {
					this.render();
					this.taskInput.value = "";
					this.evalTasklist();
				}
			},
			delTask: function(item) {
				this.tasklist.children[item].remove();
				this.evalTasklist();
			},
			error: function() {
				this.errorMessage.style.display = "block";
			}
		};

		tasker.init();
	}());
});