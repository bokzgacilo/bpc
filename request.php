<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request - BPC E-Registrar</title>
  <?php include("reusables/client-static-loader.php"); ?>
</head>
<body>
  
  <style>
    main {
      min-height: 100vh;
    }

    section > form {
      background-color: #fff;
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    @media (max-width: 992px) {
      section > form {
        padding: 1rem;
      }

      .submitrequest-desktop {
        display: none;
      }
    }

    @media (min-width: 992px) {
      .submitrequest-mobile {
        display: none;
      }
    }

    #calendar {
      max-width: 100%;
      padding: 1rem;
    }

    .fc-col-header-cell-cushion, .fc-daygrid-day-number {
      text-decoration: none;
      color: #000;
    }

    .fc-day-past {
      background-color: #a1a1a1 !important;
      color: white;
      pointer-events: none;
    }

    .fc-day-today {
      background-color: #fdffa4 !important;
      color: #000;
    }

    /* Style for displaying remaining slots */
    .fc-day-number {
      position: relative;
    }

    .remaining-slots {
        position: absolute;
        bottom: 5px;
        right: 5px;
        font-size: 12px;
        color: #fff;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 2px 4px;
        border-radius: 3px;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const calendarEl = document.getElementById('calendar')

      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        dayCellDidMount: function(info) {
          var today = new Date();
          var cellDate = new Date(info.date);
          var formattedDate = cellDate.toISOString().split('T')[0];
          var isToday = (cellDate.toDateString() === today.toDateString()); // Check if it's today



          // Fetch remaining slots for the day from the JSON object
          var remainingSlots = window.remainingSlots[formattedDate];

          console.log(formattedDate + ": " + remainingSlots)
          // var eventCountForDate = window.eventCount[formattedDate] || 0;

          // If remaining slots are undefined, set default values for weekdays and weekends
          if (remainingSlots === undefined) {
            var dayOfWeek = cellDate.getDate() - 1;
            
            remainingSlots = (dayOfWeek >= 1 && dayOfWeek <= 5) ? 5 : 0; // 5 for Mon-Fri, 0 for weekends
          }

          // console.log(eventCountForDate)
          // remainingSlots = 5 - eventCountForDate;

          // Display remaining slots inside the calendar day cell
          var slotLabel = document.createElement('div');
          slotLabel.classList.add('custom-daygrid');
          slotLabel.textContent = `${remainingSlots} slots`; // Display slot count with a label
          info.el.appendChild(slotLabel);

          // Add specific styles for past dates, today, and future dates
          if (cellDate < today) {
            info.el.classList.add('fc-day-past'); // Style past dates
          } else if (isToday) {
            info.el.classList.add('fc-day-today'); // Style today's date
          } else {
            info.el.classList.add('fc-day-future'); // Style future dates
          }
        },
        dateClick: function(info) {
          var today = new Date();
          var clickedDate = new Date(info.dateStr);

          var eventCountForDate = window.eventCount[info.dateStr] || 0;
          var remainingCount = window.remainingSlots[info.dateStr] || 0;
          console.log(eventCountForDate)

          if(eventCountForDate === 5){
            Swal.fire({
              icon: 'warning',
              title: 'No Slots Available',
              text: 'There are no slots available for this date. Try different date. [No Slot]',
              confirmButtonText: 'Okay'
            });

            return;
          }

          if (clickedDate >= today) {
            // alert('You clicked: ' + info.dateStr);
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops!',
              text: 'This date is not available for booking. [Past Date]',
              confirmButtonText: 'Okay'
            });
          }
        }
      })

      fetch('api/get_all_requested_counts.php')
        .then(response => response.json())
        .then(data => {
          window.eventCount = data.eventCount; // Assign remaining slots to a global variable
          window.remainingSlots = data.remainingSlots; // Assign remaining slots to a global variable
          calendar.render(); // Render the calendar after loading the data
        });
    })

  </script>

  <main class="container-fluid d-flex flex-lg-row flex-column p-0">
    <?php include("reusables/client-sidebar.php"); ?>
    
    <section class="col-12 col-lg-10 p-4">
      <form id="requestForm">
        <div style="display: flex; flex-direction: row; justify-content: space-between; align-items:center;">
          <h4 class="fw-bold">REQUEST FORM</h4>
          <button class="btn btn-success submitrequest-desktop" type="submit">Submit Request</button>
        </div>
        <div class="row">
          <div class="col-7">
            <h4 class="fw-bold mb-4">Choose Date</h4>
            <div id="calendar">

            </div>
          </div>
          <div class="col-5">
            <h4 class="fw-bold mb-4">Request Details</h4>
            <div class="form-group mb-2">
              <label class="form-label fw-semibold">Select Date From Calendar</label>
              <input type="date" class="form-control" name="student_number" readonly required>
            </div>
            <div class="form-group mb-2">
              <label class="form-label fw-semibold">Student Number</label>
              <input type="text" class="form-control" placeholder="04-0001-2627" name="student_number" required>
            </div>
            <div class="form-group mb-2">
              <label class="form-label fw-semibold">Program</label>
              <select class="form-select" name="program_degree">
                <option value="bsis">BSIS</option>
                <option value="bsom">BSOM</option>
                <option value="bsais">BSAIS</option>
                <option value="btvted">BTVTEd</option>
                <option value="act">ACT</option>
              </select>
            </div>
            <div class="form-group mb-2">
              <label class="form-label fw-semibold">Year Graduated</label>
              <select class="form-select" name="year_graduated">
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
              </select>
            </div>
            <div class="form-group mb-2">
              <label class="form-label fw-semibold">Document Type</label>
              <select class="form-select" name="document_type">
                <option value="tor">Transcript Of Records</option>
                <option value="good_moral">Good Moral</option>
                <option value="diploma">Diploma</option>
                <option value="c_graduation">Certificate Of Graduation</option>
                <option value="c_enrollment">Certificate Of Enrollment</option>
                <option value="c_grades">Certificate Of Grades</option>
              </select>
            </div>
            <div class="form-group mb-2">
              <label class="form-label fw-semibold">Academic Year</label>
              <select class="form-select" aria-label="Default select example" name="academic_year">
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
              </select>
            </div>
            <div class="form-group mb-2">
              <label class="form-label fw-semibold">Purpose</label>
              <input type="text" class="form-control" placeholder="For employment" name="purpose" required>
            </div>
            
          </div>
        </div>
      </form>
    </section>
  </main>
  <script>
    $("#requestForm").on("submit", function(event){
      event.preventDefault();

      var formData = new FormData(this);

      $.ajax({
        url: 'api/post_request.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success : response => {
          let json = JSON.parse(response);

          if(json.status === "success"){
            Swal.fire({
              title: json.message,
              text: json.description,
              icon: json.status,
              showCancelButton: false,
              confirmButtonText: "View My Request"
            }).then((result) => {
              if (result.isConfirmed) {
                location.href = "my-request.php"
              }
            });
          }else {
            Swal.fire({
              title: json.message,
              text: json.description,
              icon: json.status
            })
          }
        }
      });
    })
  </script>
</body>
</html>