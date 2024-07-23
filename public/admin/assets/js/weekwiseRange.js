$(document).ready(function() {
  // Handle button click event
  $(weekwise).change(function (e) { 
    e.preventDefault();
    // Get the value of the week input
    var weekValue = $('#weekwise').val();
    // Extract the year and week number from the input value
    var [year, weekNumber] = weekValue.split('-W');
    // Calculate the start and end dates of the week
    var startDate = getStartDateOfWeek(parseInt(year), parseInt(weekNumber));
    var endDate = getEndDateOfWeek(parseInt(year), parseInt(weekNumber));
    // Format the start and end dates as desired
    var formattedStartDate = formatDate(startDate);
    var formattedEndDate = formatDate(endDate);
    // Display the start and end dates
    console.log("Start Date:", formattedStartDate);
    console.log("End Date:", formattedEndDate);
  });
  // Helper function to get the start date of a week
  function getStartDateOfWeek(year, weekNumber) {
    var date = new Date(year, 0, (weekNumber - 1) * 7 + 1);
    var day = date.getDay();
    var diff = date.getDate() - day + (day === 0 ? -6 : 1); // Adjust for Sunday start of the week
    return new Date(date.setDate(diff));
  }
  // Helper function to get the end date of a week
  function getEndDateOfWeek(year, weekNumber) {
    var startDate = getStartDateOfWeek(year, weekNumber);
    var endDate = new Date(startDate);
    endDate.setDate(endDate.getDate() + 6);
    return endDate;
  }

  // Helper function to format a date as "YYYY-MM-DD"
  function formatDate(date) {
    var year = date.getFullYear();
    var month = (date.getMonth() + 1).toString().padStart(2, '0');
    var day = date.getDate().toString().padStart(2, '0');
    return `${year}-${month}-${day}`;
  }
});

