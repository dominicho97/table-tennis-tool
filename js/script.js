//-------------------------------------------------------------- DAYBLOCKS
const mondayBlock = document.querySelector('.mondayBlock')
const tuesdayBlock = document.querySelector('.tuesdayBlock')
const wednesdayBlock = document.querySelector('.wednesdayBlock')
const thursdayBlock = document.querySelector('.thursdayBlock')
const fridayBlock = document.querySelector('.fridayBlock')

//-------------------------------------------------------------- MONDAY

const mondayBtn = document.querySelector('.mondayBtn');

const monday = document.querySelector('.monday');

const mondayDisplay = () => {
  monday.style.display = 'block';
  tuesday.style.display = 'none';
  wednesday.style.display = 'none';
  thursday.style.display = 'none';
  friday.style.display = 'none';

  mondayBtn.classList.add('activeButton')
  tuesdayBtn.classList.remove('activeButton')
  wednesdayBtn.classList.remove('activeButton')
  thursdayBtn.classList.remove('activeButton')
  fridayBtn.classList.remove('activeButton')

  if (monday.style.display == 'block') {
    mondayBlock.style.display = 'block';
    tuesdayBlock.style.display = 'none';
    wednesdayBlock.style.display = 'none';
    thursdayBlock.style.display = 'none';
    fridayBlock.style.display = 'none';
  }
};

mondayBtn.addEventListener('click', mondayDisplay);


//-------------------------------------------------------------- TUESDAY

const tuesdayBtn = document.querySelector('.tuesdayBtn');

const tuesday = document.querySelector('.tuesday');

const tuesdayDisplay = () => {
  monday.style.display = 'none';
  tuesday.style.display = 'block';
  wednesday.style.display = 'none';
  thursday.style.display = 'none';
  friday.style.display = 'none';

  mondayBtn.classList.remove('activeButton')
  tuesdayBtn.classList.add('activeButton')
  wednesdayBtn.classList.remove('activeButton')
  thursdayBtn.classList.remove('activeButton')
  fridayBtn.classList.remove('activeButton')

  if (tuesday.style.display == 'block') {
    mondayBlock.style.display = 'none';
    tuesdayBlock.style.display = 'block';
    wednesdayBlock.style.display = 'none';
    thursdayBlock.style.display = 'none';
    fridayBlock.style.display = 'none';
  }
};

tuesdayBtn.addEventListener('click', tuesdayDisplay);


//-------------------------------------------------------------- WEDNESDAY

const wednesdayBtn = document.querySelector('.wednesdayBtn');

const wednesday = document.querySelector('.wednesday');

const wednesdayDisplay = () => {
  monday.style.display = 'none';
  tuesday.style.display = 'none';
  wednesday.style.display = 'block';
  thursday.style.display = 'none';
  friday.style.display = 'none';

  mondayBtn.classList.remove('activeButton')
  tuesdayBtn.classList.remove('activeButton')
  wednesdayBtn.classList.add('activeButton')
  thursdayBtn.classList.remove('activeButton')
  fridayBtn.classList.remove('activeButton')

  if (wednesday.style.display == 'block') {
    mondayBlock.style.display = 'none';
    tuesdayBlock.style.display = 'none';
    wednesdayBlock.style.display = 'block';
    thursdayBlock.style.display = 'none';
    fridayBlock.style.display = 'none';
  }
};

wednesdayBtn.addEventListener('click', wednesdayDisplay);


//-------------------------------------------------------------- THURSDAY

const thursdayBtn = document.querySelector('.thursdayBtn');

const thursday = document.querySelector('.thursday');

const thursdayDisplay = () => {
  monday.style.display = 'none';
  tuesday.style.display = 'none';
  wednesday.style.display = 'none';
  thursday.style.display = 'block';
  friday.style.display = 'none';

  mondayBtn.classList.remove('activeButton')
  tuesdayBtn.classList.remove('activeButton')
  wednesdayBtn.classList.remove('activeButton')
  thursdayBtn.classList.add('activeButton')
  fridayBtn.classList.remove('activeButton')

  if (thursday.style.display == 'block') {
    mondayBlock.style.display = 'none';
    tuesdayBlock.style.display = 'none';
    wednesdayBlock.style.display = 'none';
    thursdayBlock.style.display = 'block';
    fridayBlock.style.display = 'none';
  }
};

thursdayBtn.addEventListener('click', thursdayDisplay);


//-------------------------------------------------------------- FRIDAY

const fridayBtn = document.querySelector('.fridayBtn');

const friday = document.querySelector('.friday');

const fridayDisplay = () => {
  monday.style.display = 'none';
  tuesday.style.display = 'none';
  wednesday.style.display = 'none';
  thursday.style.display = 'none';
  friday.style.display = 'block';

  mondayBtn.classList.remove('activeButton')
  tuesdayBtn.classList.remove('activeButton')
  wednesdayBtn.classList.remove('activeButton')
  thursdayBtn.classList.remove('activeButton')
  fridayBtn.classList.add('activeButton')

  if (friday.style.display == 'block') {
    mondayBlock.style.display = 'none';
    tuesdayBlock.style.display = 'none';
    wednesdayBlock.style.display = 'none';
    thursdayBlock.style.display = 'none';
    fridayBlock.style.display = 'block';
  }
};

fridayBtn.addEventListener('click', fridayDisplay);


//-------------------------------------------------------------- GET DAY

// const date = new Date();
// const day = date.getDay();
//
// // console.log(day);
//
// if (day == 1) {
//   monday.style.display = 'block';
//   mondayBlock.style.display = 'block';
//   tuesdayBlock.style.display = 'none';
//   wednesdayBlock.style.display = 'none';
//   thursdayBlock.style.display = 'none';
//   fridayBlock.style.display = 'none';
//
//   mondayBtn.classList.add('activeButton')
//   tuesdayBtn.classList.remove('activeButton')
//   wednesdayBtn.classList.remove('activeButton')
//   thursdayBtn.classList.remove('activeButton')
//   fridayBtn.classList.remove('activeButton')
//
// } else if (day == 2) {
//   tuesday.style.display = 'block';
//   mondayBlock.style.display = 'none';
//   tuesdayBlock.style.display = 'block';
//   wednesdayBlock.style.display = 'none';
//   thursdayBlock.style.display = 'none';
//   fridayBlock.style.display = 'none';
//
//   mondayBtn.classList.remove('activeButton')
//   tuesdayBtn.classList.add('activeButton')
//   wednesdayBtn.classList.remove('activeButton')
//   thursdayBtn.classList.remove('activeButton')
//   fridayBtn.classList.remove('activeButton')
//
// } else if (day == 3) {
//   wednesday.style.display = 'block';
//   mondayBlock.style.display = 'none';
//   tuesdayBlock.style.display = 'none';
//   wednesdayBlock.style.display = 'block';
//   thursdayBlock.style.display = 'none';
//   fridayBlock.style.display = 'none';
//
//   mondayBtn.classList.remove('activeButton')
//   tuesdayBtn.classList.remove('activeButton')
//   wednesdayBtn.classList.add('activeButton')
//   thursdayBtn.classList.remove('activeButton')
//   fridayBtn.classList.remove('activeButton')
//
// } else if (day == 4) {
//   thursday.style.display = 'block';
//   mondayBlock.style.display = 'none';
//   tuesdayBlock.style.display = 'none';
//   wednesdayBlock.style.display = 'none';
//   thursdayBlock.style.display = 'block';
//   fridayBlock.style.display = 'none';
//
//   mondayBtn.classList.remove('activeButton')
//   tuesdayBtn.classList.remove('activeButton')
//   wednesdayBtn.classList.remove('activeButton')
//   thursdayBtn.classList.add('activeButton')
//   fridayBtn.classList.remove('activeButton')
//
// } else if (day == 5) {
//   friday.style.display = 'block';
//   mondayBlock.style.display = 'none';
//   tuesdayBlock.style.display = 'none';
//   wednesdayBlock.style.display = 'none';
//   thursdayBlock.style.display = 'none';
//   fridayBlock.style.display = 'block';
//
//   mondayBtn.classList.remove('activeButton')
//   tuesdayBtn.classList.remove('activeButton')
//   wednesdayBtn.classList.remove('activeButton')
//   thursdayBtn.classList.remove('activeButton')
//   fridayBtn.classList.add('activeButton')
//
// } else {
//   monday.style.display = 'block';
//   mondayBlock.style.display = 'block';
//   tuesdayBlock.style.display = 'none';
//   wednesdayBlock.style.display = 'none';
//   thursdayBlock.style.display = 'none';
//   fridayBlock.style.display = 'none';
//
//   mondayBtn.classList.add('activeButton')
//   tuesdayBtn.classList.remove('activeButton')
//   wednesdayBtn.classList.remove('activeButton')
//   thursdayBtn.classList.remove('activeButton')
//   fridayBtn.classList.remove('activeButton')
// }


//-------------------------------------------------------------- BREAKS : MONDAY

const mondayMorning = document.querySelector('.mondayMorning');
const mondayNoon = document.querySelector('.mondayNoon');
const mondayAfternoon = document.querySelector('.mondayAfternoon');

// if (document.querySelector('.mondayBreaks').value == "morning") {
//   mondayMorning.style.display = 'block';
//   mondayNoon.style.display = 'none';
//   mondayAfternoon.style.display = 'none';
// }


const mondayChangeTimeSlots = () => {

  if (document.querySelector('.mondayBreaks').value == "morning") {
    mondayMorning.style.display = 'block';
    mondayNoon.style.display = 'none';
    mondayAfternoon.style.display = 'none';
  } else if (document.querySelector('.mondayBreaks').value == "noon") {
    mondayMorning.style.display = 'none';
    mondayNoon.style.display = 'block';
    mondayAfternoon.style.display = 'none';
  } else if (document.querySelector('.mondayBreaks').value == "afternoon") {
    mondayMorning.style.display = 'none';
    mondayNoon.style.display = 'none';
    mondayAfternoon.style.display = 'block';
  }
};
mondayChangeTimeSlots();
document.querySelector('.mondayBreaks').addEventListener('change', mondayChangeTimeSlots);


//-------------------------------------------------------------- BREAKS : TUESDAY

const tuesdayMorning = document.querySelector('.tuesdayMorning');
const tuesdayNoon = document.querySelector('.tuesdayNoon');
const tuesdayAfternoon = document.querySelector('.tuesdayAfternoon');

// if (document.querySelector('.tuesdayBreaks').value == "morning") {
//   tuesdayMorning.style.display = 'block';
//   tuesdayNoon.style.display = 'none';
//   tuesdayAfternoon.style.display = 'none';
// }


const tuesdayChangeTimeSlots = () => {
  if (document.querySelector('.tuesdayBreaks').value == "morning") {
    tuesdayMorning.style.display = 'block';
    tuesdayNoon.style.display = 'none';
    tuesdayAfternoon.style.display = 'none';
  } else if (document.querySelector('.tuesdayBreaks').value == "noon") {
    tuesdayMorning.style.display = 'none';
    tuesdayNoon.style.display = 'block';
    tuesdayAfternoon.style.display = 'none';
  } else if (document.querySelector('.tuesdayBreaks').value == "afternoon") {
    tuesdayMorning.style.display = 'none';
    tuesdayNoon.style.display = 'none';
    tuesdayAfternoon.style.display = 'block';
  }
};

tuesdayChangeTimeSlots();
document.querySelector('.tuesdayBreaks').addEventListener('change', tuesdayChangeTimeSlots);

//-------------------------------------------------------------- BREAKS : WEDNESDAY

const wednesdayMorning = document.querySelector('.wednesdayMorning');
const wednesdayNoon = document.querySelector('.wednesdayNoon');
const wednesdayAfternoon = document.querySelector('.wednesdayAfternoon');

// if (document.querySelector('.wednesdayBreaks').value == "morning") {
//   wednesdayMorning.style.display = 'block';
//   wednesdayNoon.style.display = 'none';
//   wednesdayAfternoon.style.display = 'none';
// }


const wednesdayChangeTimeSlots = () => {
  if (document.querySelector('.wednesdayBreaks').value == "morning") {
    wednesdayMorning.style.display = 'block';
    wednesdayNoon.style.display = 'none';
    wednesdayAfternoon.style.display = 'none';
  } else if (document.querySelector('.wednesdayBreaks').value == "noon") {
    wednesdayMorning.style.display = 'none';
    wednesdayNoon.style.display = 'block';
    wednesdayAfternoon.style.display = 'none';
  } else if (document.querySelector('.wednesdayBreaks').value == "afternoon") {
    wednesdayMorning.style.display = 'none';
    wednesdayNoon.style.display = 'none';
    wednesdayAfternoon.style.display = 'block';
  }
};

wednesdayChangeTimeSlots();
document.querySelector('.wednesdayBreaks').addEventListener('change', wednesdayChangeTimeSlots);

//-------------------------------------------------------------- BREAKS : THURSDAY

const thursdayMorning = document.querySelector('.thursdayMorning');
const thursdayNoon = document.querySelector('.thursdayNoon');
const thursdayAfternoon = document.querySelector('.thursdayAfternoon');

// if (document.querySelector('.thursdayBreaks').value == "morning") {
//   thursdayMorning.style.display = 'block';
//   thursdayNoon.style.display = 'none';
//   thursdayAfternoon.style.display = 'none';
// }


const thursdayChangeTimeSlots = () => {
  if (document.querySelector('.thursdayBreaks').value == "morning") {
    thursdayMorning.style.display = 'block';
    thursdayNoon.style.display = 'none';
    thursdayAfternoon.style.display = 'none';
  } else if (document.querySelector('.thursdayBreaks').value == "noon") {
    thursdayMorning.style.display = 'none';
    thursdayNoon.style.display = 'block';
    thursdayAfternoon.style.display = 'none';
  } else if (document.querySelector('.thursdayBreaks').value == "afternoon") {
    thursdayMorning.style.display = 'none';
    thursdayNoon.style.display = 'none';
    thursdayAfternoon.style.display = 'block';
  }
};

thursdayChangeTimeSlots();
document.querySelector('.thursdayBreaks').addEventListener('change', thursdayChangeTimeSlots);

//-------------------------------------------------------------- BREAKS : FRIDAY

const fridayMorning = document.querySelector('.fridayMorning');
const fridayNoon = document.querySelector('.fridayNoon');
const fridayAfternoon = document.querySelector('.fridayAfternoon');

// if (document.querySelector('.fridayBreaks').value == "morning") {
//   fridayMorning.style.display = 'block';
//   fridayNoon.style.display = 'none';
//   fridayAfternoon.style.display = 'none';
// }


const fridayChangeTimeSlots = () => {
  if (document.querySelector('.fridayBreaks').value == "morning") {
    fridayMorning.style.display = 'block';
    fridayNoon.style.display = 'none';
    fridayAfternoon.style.display = 'none';
  } else if (document.querySelector('.fridayBreaks').value == "noon") {
    fridayMorning.style.display = 'none';
    fridayNoon.style.display = 'block';
    fridayAfternoon.style.display = 'none';
  } else if (document.querySelector('.fridayBreaks').value == "afternoon") {
    fridayMorning.style.display = 'none';
    fridayNoon.style.display = 'none';
    fridayAfternoon.style.display = 'block';
  }
};

fridayChangeTimeSlots();
document.querySelector('.fridayBreaks').addEventListener('change', fridayChangeTimeSlots);

//-------------------------------------------------------------- CHECKBOX


const checkbox = document.querySelector(".checkbox");
const target = document.querySelector(".target");


const checkboxClick = () => {
  if (checkbox.checked) {
    target.style.display="block";
  } else {
    target.style.display="none";
  }
}

checkbox.addEventListener("click", checkboxClick);











//stay down
