// collapse
$(".collaose_menu").on("click", function () {
  $(".main_dashboard_m").toggleClass("collaose_menu_m");
});
$(document).ready(function () {
  function checkScreenWidth(e) {
    if (e.matches) {
      $(".main_dashboard_m").addClass("collaose_menu_m");
    } else {
      $(".main_dashboard_m").removeClass("collaose_menu_m");
    }
  }

  var mediaQuery = window.matchMedia("(max-width: 767px)");

  checkScreenWidth(mediaQuery);
  mediaQuery.addListener(checkScreenWidth);
});

// search bar
$(document).ready(function () {
  var $searchbar = $("#searchbar");
  var $searchbarinput = $("#searchbarinput");
  var $dropdown = $("#dropdown");
  var $resultlist = $("#resultlist");
  var $lis = $resultlist.find("li");

  function darksoulsearch() {
    $searchbarinput.css("border-radius", "25px 25px 0 0");

    $resultlist.css("display", "flex");

    $dropdown.css({
      animation: "height 0.5s 1 linear forwards",
      height: "fit-content",
      "max-height": "200px",
      "overflow-x": "hidden",
      "overflow-y": "scroll",
      transition: "all 0.5s",
    });
  }

  function closesearch() {
    $searchbarinput.css("border-radius", "25px");

    $dropdown.css({
      animation: "revheight 0.5s 1 linear forwards",
      height: "fit-content",
      "max-height": "0px",
      "overflow-x": "hidden",
      "overflow-y": "scroll",
      transition: "all 0.5s",
    });

    $resultlist.css("display", "none");
  }

  $(window).on("click", function (event) {
    if (!$(event.target).is($searchbarinput)) {
      closesearch();
      console.log("body");
    }
  });

  $searchbarinput.on("input", function () {
    var searchValue = $searchbarinput.val().toLowerCase();

    $lis.each(function () {
      var $li = $(this);
      var liName = $li.text().toLowerCase();

      if (liName.includes(searchValue)) {
        darksoulsearch();
        $li.css("display", "flex");
      } else {
        $li.css("display", "none");
      }
    });
  });
});

// checkbox
$(document).ready(function () {
  $("#toggleCheckbox").change(function () {
    $(".field_show_1").toggle(this.checked);
  });

  $("#toggleCheckbox2").change(function () {
    $(".field_show_2").toggle(this.checked);
  });

  $(".field_show_1").toggle($("#toggleCheckbox").is(":checked"));
  $(".field_show_2").toggle($("#toggleCheckbox2").is(":checked"));

  // for add new progeny show form

  $(".add_progeny_data").on("click", function () {
    if ($(".main_stallions_p").is(":visible")) {
      $(".main_stallions_p").hide();
      $(".add_new_progeny").show();
    } else {
      $(".main_stallions_p").show();
      $(".add_new_progeny").hide();
    }
  });
  // show image add new fields
  $(".add_imgs_b").on("click", function () {
    if ($(".add_imgs_i").is(":visible")) {
      $(".add_imgs_i").hide();
      $(".add-new-img-p").show();
    } else {
      $(".add_imgs_i").show();
      $(".add-new-img-p").hide();
    }
  });
  // add video filed showing
  $(".add_video_b").on("click", function () {
    if ($(".add_video_i").is(":visible")) {
      $(".add_video_i").hide();
      $(".add-new-video-p").show();
    } else {
      $(".add_video_i").show();
      $(".add-new-video-p").hide();
    }
  });
  // for tabs stallions main
  function showTab(tabId) {
    $(".tab-content").removeClass("active");
    $("#" + tabId).addClass("active");
    $(".tab-link").removeClass("active");
    $(".tab-link[data-tab='" + tabId + "']").addClass("active");
  }

  $(".tab-link").on("click", function () {
    const tabId = $(this).data("tab");
    showTab(tabId);
  });

  $(".btn_update").on("click", function () {
    const nextTab = $(".tab-link.active").next(".tab-link").data("tab");
    if (nextTab) showTab(nextTab);
  });

  $(".Back_btn").on("click", function () {
    const prevTab = $(".tab-link.active").prev(".tab-link").data("tab");
    if (prevTab) showTab(prevTab);
  });

  showTab("tab-1");
});

// for pedigree edit text
$(document).ready(function () {
  $(".black-node, .blue-node, .pink-node").on("click", function (e) {
    e.preventDefault();

    $(this).attr("contenteditable", "true").text("").focus();
  });

  $(".black-node, .blue-node, .pink-node").on(
    "blur keypress",
    function (event) {
      if (
        event.type === "blur" ||
        (event.type === "keypress" && event.which === 13)
      ) {
        $(this).removeAttr("contenteditable");

        if (event.which === 13) event.preventDefault();
      }
    }
  );
});
// upload images
window.onload = function () {
  if (window.File && window.FileList && window.FileReader) {
    $(document).on("change", "#files", function (event) {
      var files = event.target.files;
      var output = document.getElementById("result");

      // Set display to block
      output.style.display = "block";

      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if (file.type.match("image.*")) {
          if (this.files[0].size < 2097152) {
            var picReader = new FileReader();
            picReader.addEventListener("load", function (event) {
              var picFile = event.target;
              var div = document.createElement("div");
              div.innerHTML =
                "<img class='thumbnail' src='" +
                picFile.result +
                "' title='preview image'/>";
              output.insertBefore(div, null);
            });
            $("#clear, #result").show();
            picReader.readAsDataURL(file);
          } else {
            alert("Image Size is too big. Maximum size is 2MB.");
            $(this).val("");
          }
        } else {
          alert("You can only upload image files.");
          $(this).val("");
        }
      }
    });
  } else {
    console.log("Your browser does not support File API");
  }
};

$(document).on("click", "#files", function () {
  $(".thumbnail").parent().remove();
  $("#result").hide();
  $(this).val("");
});

$(document).on("click", "#clear", function () {
  $(".thumbnail").parent().remove();
  $("#result").hide();
  $("#files").val("");
  $(this).hide();
});

// for calender
!(function () {
  var today = moment();

  function Calendar(selector, events) {
    this.el = document.querySelector(selector);
    this.events = events;
    this.current = moment().date(1);
    this.draw();
    var current = document.querySelector(".today");
    if (current) {
      var self = this;
      window.setTimeout(function () {
        self.openDay(current);
      }, 500);
    }
  }

  Calendar.prototype.draw = function () {
    //Create Header
    this.drawHeader();

    //Draw Month
    this.drawMonth();

    this.drawLegend();
  };

  Calendar.prototype.drawHeader = function () {
    var self = this;
    if (!this.header) {
      //Create the header elements
      this.header = createElement("div", "header");
      this.header.className = "header";

      this.title = createElement("h1");

      var right = createElement("div", "right");
      right.addEventListener("click", function () {
        self.nextMonth();
      });

      var left = createElement("div", "left");
      left.addEventListener("click", function () {
        self.prevMonth();
      });

      //Append the Elements
      this.header.appendChild(this.title);
      this.header.appendChild(right);
      this.header.appendChild(left);
      this.el.appendChild(this.header);
    }

    this.title.innerHTML = this.current.format("MMMM YYYY");
  };

  Calendar.prototype.drawMonth = function () {
    var self = this;

    this.events.forEach(function (ev) {
      ev.date = self.current.clone().date(Math.random() * (29 - 1) + 1);
    });

    if (this.month) {
      this.oldMonth = this.month;
      this.oldMonth.className = "month out " + (self.next ? "next" : "prev");
      this.oldMonth.addEventListener("webkitAnimationEnd", function () {
        self.oldMonth.parentNode.removeChild(self.oldMonth);
        self.month = createElement("div", "month");
        self.backFill();
        self.currentMonth();
        self.fowardFill();
        self.el.appendChild(self.month);
        window.setTimeout(function () {
          self.month.className = "month in " + (self.next ? "next" : "prev");
        }, 16);
      });
    } else {
      this.month = createElement("div", "month");
      this.el.appendChild(this.month);
      this.backFill();
      this.currentMonth();
      this.fowardFill();
      this.month.className = "month new";
    }
  };

  Calendar.prototype.backFill = function () {
    var clone = this.current.clone();
    var dayOfWeek = clone.day();

    if (!dayOfWeek) {
      return;
    }

    clone.subtract("days", dayOfWeek + 1);

    for (var i = dayOfWeek; i > 0; i--) {
      this.drawDay(clone.add("days", 1));
    }
  };

  Calendar.prototype.fowardFill = function () {
    var clone = this.current.clone().add("months", 1).subtract("days", 1);
    var dayOfWeek = clone.day();

    if (dayOfWeek === 6) {
      return;
    }

    for (var i = dayOfWeek; i < 6; i++) {
      this.drawDay(clone.add("days", 1));
    }
  };

  Calendar.prototype.currentMonth = function () {
    var clone = this.current.clone();

    while (clone.month() === this.current.month()) {
      this.drawDay(clone);
      clone.add("days", 1);
    }
  };

  Calendar.prototype.getWeek = function (day) {
    if (!this.week || day.day() === 0) {
      this.week = createElement("div", "week");
      this.month.appendChild(this.week);
    }
  };

  Calendar.prototype.drawDay = function (day) {
    var self = this;
    this.getWeek(day);

    //Outer Day
    var outer = createElement("div", this.getDayClass(day));
    outer.addEventListener("click", function () {
      self.openDay(this);
    });

    //Day Name
    var name = createElement("div", "day-name", day.format("ddd"));

    //Day Number
    var number = createElement("div", "day-number", day.format("DD"));

    //Events
    var events = createElement("div", "day-events");
    this.drawEvents(day, events);

    outer.appendChild(name);
    outer.appendChild(number);
    outer.appendChild(events);
    this.week.appendChild(outer);
  };

  Calendar.prototype.drawEvents = function (day, element) {
    if (day.month() === this.current.month()) {
      var todaysEvents = this.events.reduce(function (memo, ev) {
        if (ev.date.isSame(day, "day")) {
          memo.push(ev);
        }
        return memo;
      }, []);

      todaysEvents.forEach(function (ev) {
        var evSpan = createElement("span", ev.color);
        element.appendChild(evSpan);
      });
    }
  };

  Calendar.prototype.getDayClass = function (day) {
    classes = ["day"];
    if (day.month() !== this.current.month()) {
      classes.push("other");
    } else if (today.isSame(day, "day")) {
      classes.push("today");
    }
    return classes.join(" ");
  };

  Calendar.prototype.openDay = function (el) {
    var details, arrow;
    var dayNumber =
      +el.querySelectorAll(".day-number")[0].innerText ||
      +el.querySelectorAll(".day-number")[0].textContent;
    var day = this.current.clone().date(dayNumber);

    var currentOpened = document.querySelector(".details");

    //Check to see if there is an open detais box on the current row
    if (currentOpened && currentOpened.parentNode === el.parentNode) {
      details = currentOpened;
      arrow = document.querySelector(".arrow");
    } else {
      //Close the open events on differnt week row
      //currentOpened && currentOpened.parentNode.removeChild(currentOpened);
      if (currentOpened) {
        currentOpened.addEventListener("webkitAnimationEnd", function () {
          currentOpened.parentNode.removeChild(currentOpened);
        });
        currentOpened.addEventListener("oanimationend", function () {
          currentOpened.parentNode.removeChild(currentOpened);
        });
        currentOpened.addEventListener("msAnimationEnd", function () {
          currentOpened.parentNode.removeChild(currentOpened);
        });
        currentOpened.addEventListener("animationend", function () {
          currentOpened.parentNode.removeChild(currentOpened);
        });
        currentOpened.className = "details out";
      }

      //Create the Details Container
      details = createElement("div", "details in");

      //Create the arrow
      var arrow = createElement("div", "arrow");

      //Create the event wrapper

      details.appendChild(arrow);
      el.parentNode.appendChild(details);
    }

    var todaysEvents = this.events.reduce(function (memo, ev) {
      if (ev.date.isSame(day, "day")) {
        memo.push(ev);
      }
      return memo;
    }, []);

    this.renderEvents(todaysEvents, details);

    arrow.style.left = el.offsetLeft - el.parentNode.offsetLeft + 27 + "px";
  };

  Calendar.prototype.renderEvents = function (events, ele) {
    //Remove any events in the current details element
    var currentWrapper = ele.querySelector(".events");
    var wrapper = createElement(
      "div",
      "events in" + (currentWrapper ? " new" : "")
    );

    events.forEach(function (ev) {
      var div = createElement("div", "event");
      var square = createElement("div", "event-category " + ev.color);
      var span = createElement("span", "", ev.eventName);

      div.appendChild(square);
      div.appendChild(span);
      wrapper.appendChild(div);
    });

    if (!events.length) {
      var div = createElement("div", "event empty");
      var span = createElement("span", "", "No Events");

      div.appendChild(span);
      wrapper.appendChild(div);
    }

    if (currentWrapper) {
      currentWrapper.className = "events out";
      currentWrapper.addEventListener("webkitAnimationEnd", function () {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
      });
      currentWrapper.addEventListener("oanimationend", function () {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
      });
      currentWrapper.addEventListener("msAnimationEnd", function () {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
      });
      currentWrapper.addEventListener("animationend", function () {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
      });
    } else {
      ele.appendChild(wrapper);
    }
  };

  Calendar.prototype.drawLegend = function () {
    var legend = createElement("div", "legend");
    var calendars = this.events
      .map(function (e) {
        return e.calendar + "|" + e.color;
      })
      .reduce(function (memo, e) {
        if (memo.indexOf(e) === -1) {
          memo.push(e);
        }
        return memo;
      }, [])
      .forEach(function (e) {
        var parts = e.split("|");
        var entry = createElement("span", "entry " + parts[1], parts[0]);
        legend.appendChild(entry);
      });
    this.el.appendChild(legend);
  };

  Calendar.prototype.nextMonth = function () {
    this.current.add("months", 1);
    this.next = true;
    this.draw();
  };

  Calendar.prototype.prevMonth = function () {
    this.current.subtract("months", 1);
    this.next = false;
    this.draw();
  };

  window.Calendar = Calendar;

  function createElement(tagName, className, innerText) {
    var ele = document.createElement(tagName);
    if (className) {
      ele.className = className;
    }
    if (innerText) {
      ele.innderText = ele.textContent = innerText;
    }
    return ele;
  }
})();

!(function () {
  var data = [
    { eventName: "Lunch Meeting w/ Mark", calendar: "Work", color: "orange" },
    {
      eventName: "Interview - Jr. Web Developer",
      calendar: "Work",
      color: "orange",
    },
    {
      eventName: "Demo New App to the Board",
      calendar: "Work",
      color: "orange",
    },
    { eventName: "Dinner w/ Marketing", calendar: "Work", color: "orange" },

    { eventName: "Game vs Portalnd", calendar: "Sports", color: "blue" },
    { eventName: "Game vs Houston", calendar: "Sports", color: "blue" },
    { eventName: "Game vs Denver", calendar: "Sports", color: "blue" },
    { eventName: "Game vs San Degio", calendar: "Sports", color: "blue" },

    { eventName: "School Play", calendar: "Kids", color: "yellow" },
    {
      eventName: "Parent/Teacher Conference",
      calendar: "Kids",
      color: "yellow",
    },
    {
      eventName: "Pick up from Soccer Practice",
      calendar: "Kids",
      color: "yellow",
    },
    { eventName: "Ice Cream Night", calendar: "Kids", color: "yellow" },

    { eventName: "Free Tamale Night", calendar: "Other", color: "green" },
    { eventName: "Bowling Team", calendar: "Other", color: "green" },
    { eventName: "Teach Kids to Code", calendar: "Other", color: "green" },
    { eventName: "Startup Weekend", calendar: "Other", color: "green" },
  ];

  function addDate(ev) {}

  var calendar = new Calendar("#calendar", data);
})();
