<template>
    <div class="track-container">
        <input class="range-value min" :value="minValue" @keydown="validateInput"
               @blur="minValue = $event.target.value; this.updateTrack('track1')"
        >
        <input class="range-value max" :value="maxValue"
               @blur="maxValue = $event.target.value; this.updateTrack('track2')"
        >

        <div class="track bg-primary-gray opacity-50" ref="_vpcTrack" />
        <div class="track-highlight bg-primary-gray opacity-100" ref="trackHighlight" />
        <button class="track-btn track1 bg-primary-light-green rounded-full" ref="track1" />
        <button class="track-btn track2 bg-primary-light-green rounded-full" ref="track2" />
    </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "RangeInput",
    props: {
        min: {
            type: Number,
            default: 0,
            required: true
        },
        max: {
            type: Number,
            default: 100,
            required: true
        },
        step: {
            type: Number,
            default: 1
        },
        minStarting: {
            type: Number,
            default: null
        },
        maxStarting: {
            type: Number,
            default: null
        }
    },
    data() {
        return {
            minValue: this.minStarting ?? (this.min * 3.0 + this.max) / 4.0,
            maxValue: this.maxStarting ?? (this.max * 3.0 + this.min) / 4.0,
            totalSteps: 0,
            percentPerStep: 1,
            trackWidth: null,
            isDragging: false,
            pos: {
                curTrack: null
            },
            track1Left: 0
        }
    },
    methods: {
        validateInput(ev) {
            let k = ev.key;
            if (k.length === 1 && isNaN(Number(k)) && k !== '.') {
                ev.preventDefault();
            }
        },
        updateTrack(track) {
            let maxTrack = track === 'track2';
            let pos  = maxTrack ? this.maxValue : this.minValue;
            let pos2 = maxTrack ? this.minValue : this.maxValue;

            if (maxTrack) {
                pos2 = Math.max(pos2, this.min + this.step)
                pos = Math.min(Math.max(pos, pos2), this.max);
                this.maxValue = pos;
            } else {
                pos2 = Math.min(pos2, this.max - this.step)
                pos = Math.max(Math.min(pos, pos2), this.min);
                this.minValue = pos;
            }

            this.maxValue ??= this.max;
            this.minValue ??= this.min;

            let moveInPct = this.valueToPercent(pos);
            //if (moveInPct < 0 || moveInPct > 100) return;

            this.$refs[track].style.left = moveInPct + '%';
            this.setTrackHightlight()
        },
        moveTrack(track, ev) {

            let percentInPx = this.getPercentInPx();

            let trackX = Math.round(this.$refs._vpcTrack.getBoundingClientRect().left);
            let clientX = ev.clientX;
            let moveDiff = clientX - trackX;

            let moveInPct = moveDiff / percentInPx

            if(moveInPct < 0 || moveInPct > 100) return;
            let value = ( Math.round(moveInPct / this.percentPerStep) * this.step ) + this.min;
            if (track === 'track1'){
                if(value >= (this.maxValue - this.step)) return;
                this.minValue = value;
            }

            if (track === 'track2'){
                if(value <= (this.minValue + this.step)) return;
                this.maxValue = value;
            }

            this.$refs[track].style.left = moveInPct + '%';
            this.setTrackHightlight()
        },
        mousedown(ev, track){
            if (this.isDragging) return;
            this.isDragging = true;
            this.pos.curTrack = track;
        },

        touchstart(ev, track){
            this.mousedown(ev, track)
        },

        mouseup(ev, track){
            if (!this.isDragging) return;
            this.isDragging = false
        },

        touchend(ev, track){
            this.mouseup(ev, track)
        },

        mousemove(ev, track){
            if (!this.isDragging) return;
            this.moveTrack(track, ev)
        },

        touchmove(ev, track){
            this.mousemove(ev.changedTouches[0], track)
        },

        valueToPercent(value){
            return ((value - this.min) / this.step) * this.percentPerStep
        },

        setTrackHightlight(){
            this.$refs.trackHighlight.style.left = this.valueToPercent(this.minValue) + '%'
            this.$refs.trackHighlight.style.width = (this.valueToPercent(this.maxValue) - this.valueToPercent(this.minValue)) + '%'
        },

        getPercentInPx(){
            let trackWidth = this.$refs._vpcTrack.offsetWidth;
            let oneStepInPx = trackWidth / this.totalSteps;
            // 1 percent in px
            return oneStepInPx / this.percentPerStep;
        },

        setClickMove(ev){
            let track1Left = this.$refs.track1.getBoundingClientRect().left;
            let track2Left = this.$refs.track2.getBoundingClientRect().left;
            // console.log('track1Left', track1Left)
            if (ev.clientX < track1Left || (ev.clientX - track1Left) < (track2Left - ev.clientX)) {
                this.moveTrack('track1', ev)
            } else {
                this.moveTrack('track2', ev)
            }
        }
    },

    mounted() {
        /*this.minValue = this.minStarting ?? (this.min * 3.0 + this.max) / 4.0;
        this.maxValue = this.maxStarting ?? (this.max * 3.0 + this.min) / 4.0;*/

        this.totalSteps = (this.max - this.min) / this.step;

        // percent the track button to be moved on each step
        this.percentPerStep = 100 / this.totalSteps;
        // console.log('percentPerStep', this.percentPerStep)

        // set track initial pos
        let centeredOffset = this.percentPerStep * 0.5;
        this.$refs.track1.style.left = (this.valueToPercent(this.minValue) + centeredOffset) + '%';
        this.$refs.track2.style.left = (this.valueToPercent(this.maxValue) + centeredOffset) + '%';
        // set initial track highlight
        this.setTrackHightlight()

        let self = this;

        ['mouseup', 'mousemove'].forEach( type => {
            document.body.addEventListener(type, (ev) => {
                // ev.preventDefault();
                if(self.isDragging && self.pos.curTrack){
                    self[type](ev, self.pos.curTrack)
                }
            })
        });

        ['mousedown', 'mouseup', 'mousemove', 'touchstart', 'touchmove', 'touchend'].forEach( type => {
            document.querySelector('.track1').addEventListener(type, (ev) => {
                ev.stopPropagation();
                self[type](ev, 'track1')
            })

            document.querySelector('.track2').addEventListener(type, (ev) => {
                ev.stopPropagation();
                self[type](ev, 'track2')
            })
        })

        // on track click
        document.querySelector('.track').addEventListener('click', function(ev) {
            ev.stopPropagation();
            self.setClickMove(ev)

        })

        document.querySelector('.track-highlight').addEventListener('click', function(ev) {
            ev.stopPropagation();
            self.setClickMove(ev)

        })
    }
})

</script>

<style scoped lang="sass">

.range-value
    @apply absolute w-[2rem]

.range-value.min
    @apply left-[-2.5rem]

.range-value.max
    @apply right-[-2.5rem]

.track-container
    @apply relative flex flex-col justify-center items-center mx-12 h-2 cursor-pointer

.track,
.track-highlight
    @apply block absolute w-full h-2

.track-highlight
    @apply z-[2]

.track-btn
    @apply block absolute z-[2] w-6 h-6 ml-[-1rem] border-none appearance-none outline-none cursor-pointer touch-pan-x
    top: calc(-50% - 0.25rem)

</style>