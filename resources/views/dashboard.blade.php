<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <!-- Countdown Timer -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Launching In:</h3>
                        <div class="grid grid-cols-5 gap-4 max-w-3xl mx-auto">
                            <div
                                class="bg-blue-100 dark:bg-blue-900 rounded-lg p-4 transition-all duration-300 hover:scale-105">
                                <div id="months" class="text-4xl font-bold text-blue-600 dark:text-blue-300">02</div>
                                <div class="text-gray-600 dark:text-gray-300">Months</div>
                            </div>
                            <div
                                class="bg-green-100 dark:bg-green-900 rounded-lg p-4 transition-all duration-300 hover:scale-105">
                                <div id="days" class="text-4xl font-bold text-green-600 dark:text-green-300">00
                                </div>
                                <div class="text-gray-600 dark:text-gray-300">Days</div>
                            </div>
                            <div
                                class="bg-yellow-100 dark:bg-yellow-900 rounded-lg p-4 transition-all duration-300 hover:scale-105">
                                <div id="hours" class="text-4xl font-bold text-yellow-600 dark:text-yellow-300">00
                                </div>
                                <div class="text-gray-600 dark:text-gray-300">Hours</div>
                            </div>
                            <div
                                class="bg-orange-100 dark:bg-orange-900 rounded-lg p-4 transition-all duration-300 hover:scale-105">
                                <div id="minutes" class="text-4xl font-bold text-orange-600 dark:text-orange-300">00
                                </div>
                                <div class="text-gray-600 dark:text-gray-300">Minutes</div>
                            </div>
                            <div
                                class="bg-red-100 dark:bg-red-900 rounded-lg p-4 transition-all duration-300 hover:scale-105">
                                <div id="seconds" class="text-4xl font-bold text-red-600 dark:text-red-300">00</div>
                                <div class="text-gray-600 dark:text-gray-300">Seconds</div>
                            </div>
                        </div>
                    </div>

                    <!-- Coming Soon Message -->
                    <div class="text-6xl font-extrabold text-gray-800 dark:text-gray-200 mb-6 animate-pulse">
                        {{ __('Coming Soon !!!') }}
                    </div>

                    <!-- Animated Progress Bar -->
                    <div class="max-w-2xl mx-auto mb-8">
                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden relative">
                            <div id="progress-bar"
                                class="h-full bg-gradient-to-r from-blue-500 to-purple-600 rounded-full transition-all duration-1000 ease-out"
                                style="width: 0%"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div id="progress-text" class="text-xs font-bold text-white dark:text-gray-200">0%</div>
                            </div>
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">Progress</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set the target date (2 months from now)
        const targetDate = new Date();
        targetDate.setMonth(targetDate.getMonth() + 2);

        // Animate progress bar to 50%
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        let progress = 0;
        const targetProgress = 50;
        const progressInterval = setInterval(() => {
            if (progress >= targetProgress) {
                clearInterval(progressInterval);
                return;
            }
            progress += 1;
            progressBar.style.width = `${progress}%`;
            progressText.textContent = `${progress}%`;
        }, 30);

        function updateCountdown() {
            const now = new Date();
            const diff = targetDate - now;

            if (diff <= 0) {
                document.getElementById('months').textContent = '00';
                document.getElementById('days').textContent = '00';
                document.getElementById('hours').textContent = '00';
                document.getElementById('minutes').textContent = '00';
                document.getElementById('seconds').textContent = '00';
                return;
            }

            // Calculate time units
            const totalSeconds = Math.floor(diff / 1000);
            const totalMinutes = Math.floor(totalSeconds / 60);
            const totalHours = Math.floor(totalMinutes / 60);
            const totalDays = Math.floor(totalHours / 24);

            const months = Math.floor(totalDays / 30);
            const days = totalDays % 30;
            const hours = totalHours % 24;
            const minutes = totalMinutes % 60;
            const seconds = totalSeconds % 60;

            // Animate number changes
            animateNumber('months', months);
            animateNumber('days', days);
            animateNumber('hours', hours);
            animateNumber('minutes', minutes);
            animateNumber('seconds', seconds);

            setTimeout(updateCountdown, 1000);
        }

        function animateNumber(elementId, targetValue) {
            const element = document.getElementById(elementId);
            const currentValue = parseInt(element.textContent) || 0;
            const increment = targetValue > currentValue ? 1 : -1;

            let current = currentValue;
            const timer = setInterval(() => {
                current += increment;
                element.textContent = current.toString().padStart(2, '0');

                if ((increment > 0 && current >= targetValue) ||
                    (increment < 0 && current <= targetValue)) {
                    clearInterval(timer);
                    element.textContent = targetValue.toString().padStart(2, '0');
                }
            }, 50);
        }

        // Start the countdown
        updateCountdown();
    </script>
</x-app-layout>
