document.addEventListener('DOMContentLoaded', function () {
    const reminders = <?php echo json_encode($reminders); ?>;

    reminders.forEach(reminder => {
        const reminderTime = new Date(reminder.reminder_time);
        const now = new Date();
        const timeDifference = reminderTime.getTime() - now.getTime();

        if (timeDifference > 0) {
            setTimeout(() => {
                if (Notification.permission === "granted") {
                    new Notification("Pengingat Tugas", {
                        body: `Tugas "${reminder.task_name}" hampir jatuh tempo!`
                    });
                }
            }, timeDifference);
        }
    });
});

if (Notification.permission !== "granted") {
    Notification.requestPermission();
}
