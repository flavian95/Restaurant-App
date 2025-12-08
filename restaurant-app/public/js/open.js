
function openOrClosed() {
    const badgeOpen = document.querySelector('.badge-open');
    const textOpen = document.querySelector('.text-open');

    const now = new Date();
    const est = new Date(now.toLocaleString("en-US", { timeZone: "Europe/Bucharest" }));

    const hour = est.getHours();

    const OPEN_TIME = 7;
    const CLOSE_TIME = 20;

    const isOpen = hour >= OPEN_TIME && hour < CLOSE_TIME;

    if (isOpen) {
        badgeOpen.classList.remove('bg-danger');
        badgeOpen.classList.add('bg-success');
        badgeOpen.innerText = "OPEN NOW";

        textOpen.innerText = "Closes at 8:00 PM";
    }
     else {
        badgeOpen.classList.remove('bg-success');
        badgeOpen.classList.add('bg-danger');
        badgeOpen.innerText = "CLOSED NOW";

        let opensText;

        if (hour >= CLOSE_TIME) {
            opensText = "Opens Tomorrow at 8:00 AM";
        } else {
            opensText = "Opens Today at 8:00 AM";
        }

        textOpen.innerText = `${opensText}`;
    }
}

openOrClosed();