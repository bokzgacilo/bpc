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
      padding: 2rem 4rem;
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
      max-width: 700px;
      padding: 1rem;
    }

    .fc-col-header-cell-cushion, .fc-daygrid-day-number {
      text-decoration: none;
      color: #000;
    }

  </style>
  <script>

    document.addEventListener('DOMContentLoaded', function() {
      const calendarEl = document.getElementById('calendar')

      var events = [
        {
          title: 'Taken',
          start: '2024-10-25',
        },
        {
          title: 'Taken',
          start: '2024-10-28'
        },
        {
          title: 'Taken',
          start: '2024-10-29'
        }
      ];

      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap',
        bootstrapFontAwesome: false,
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth'
        },
        selectable: true,
        selectOverlap: false,
        select: function(info) {
          // Make sure only one date is selectable (not a range)
          var startDate = info.startStr;

          // Create a custom event with an 'X' button to remove the event
          var event = calendar.addEvent({
            title: 'X',  // The 'X' to remove the event
            start: startDate,
            allDay: true,  // Ensure this is a full-day event
            classNames: ['removable-event'],  // Add custom class for styling
            editable: true  // Make event editable (optional)
          });

          console.log(startDate)
        },
        selectAllow: function(selectInfo) {
          return selectInfo.startStr === selectInfo.endStr;  // Only allow if the start and end dates are the same
        },
        events: events,
        eventClick: function(info){
          alert("Date Taken")
        }
      })
      calendar.render()
    })

  </script>

  <main class="container-fluid d-flex flex-lg-row flex-column p-0">
    <?php include("reusables/client-sidebar.php"); ?>
    
    <section class="col-12 col-lg-10">
      
      <form id="requestForm">
        <div style="display: flex; flex-direction: row; justify-content: space-between; align-items:center;">
          <h1>Request Fill Out Form</h1>
          <button class="btn btn-success submitrequest-desktop" type="submit">Submit Request</button>
        </div>
        <hr />
        <h3>Schedule of Appointment</h3>
        <div class="row">
          <div id="calendar">

          </div>
        </div>
        <h3>Student Information</h3>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Student Number</label>
            <input type="text" class="form-control" placeholder="04-0001-2627" name="student_number" required>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Last Name</label>
            <input type="text" class="form-control" placeholder="Dela Cruz" name="lastname" required>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="Juan Mark" name="firstname" required>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Last Name</label>
            <input type="text" class="form-control" placeholder="Marcos" name="middlename" required>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Extension Name</label>
            <select class="form-select" aria-label="Default select example" name="extension_name">
              <option selected>None</option>
              <option value="jr">Jr</option>
              <option value="sr">Sr</option>
              <option value="ii">II</option>
              <option value="iii">III</option>
              <option value="iv">IV</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Program</label>
            <select class="form-select" name="program_degree">
              <option value="bsis">BSIS</option>
              <option value="bsom">BSOM</option>
              <option value="bsais">BSAIS</option>
              <option value="btvted">BTVTEd</option>
              <option value="act">ACT</option>
            </select>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Year Graduated</label>
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
        </div>
        <h3 class="mt-4">Address & Contact Information</h3>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Email Address</label>
            <input type="text" class="form-control" placeholder="j.delacruz@gmail.com" name="client_email" required>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Contact Number</label>
            <input type="text" class="form-control" placeholder="09762220955" name="client_contact_number1" required>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Alternate Contact Number</label>
            <input type="text" class="form-control" placeholder="09304696712" name="client_contact_number2" required>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Block/House/Building Number</label>
            <input type="text" class="form-control" placeholder="Building 37" name="house_number" required>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Street Name</label>
            <input type="text" class="form-control" placeholder="Nakpil St" name="street_name" required>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Barangay</label>
            <input type="text" class="form-control" placeholder="Isidro" name="barangay" required>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Municipality/City</label>
            <input type="text" class="form-control" placeholder="Pampanga" name="municipality" required>
          </div>
        </div>
        <h3 class="mt-4">Request Details</h3>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Document Type</label>
            <select class="form-select" name="document_type">
              <option value="tor">Transcript Of Records</option>
              <option value="good_moral">Good Moral</option>
              <option value="diploma">Diploma</option>
              <option value="c_graduation">Certificate Of Graduation</option>
              <option value="c_enrollment">Certificate Of Enrollment</option>
              <option value="c_grades">Certificate Of Grades</option>
            </select>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Academic Year</label>
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
          <div class="col-12 col-md-6 col-lg-3">
            <label for="exampleInputPassword1" class="form-label">Purpose</label>
            <input type="text" class="form-control" placeholder="For employment" name="purpose" required>
          </div>
        </div>
        <button class="btn btn-success submitrequest-mobile" type="submit">Submit Request</button>
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