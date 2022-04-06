<?php
/**
 * Round-robin schedule generation implementation
 * 
 * @author Michael P. Nitowski <mpnitowski@gmail.com>
 * 
 * MIT License
 *
 * Copyright (c) 2016 Michael P. Nitowski
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:

 * The above copyright notice and this permission notice shall be included in 
 * all copies or substantial portions of the Software.

 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

/**
 * Class for immutable schedule object
 * 
 * Methods utilize master schedule; can generate individual team schedules as 
 * well as simple textual representation of schedule
 */
class Schedule implements IteratorAggregate
{
    /**
     * @see make_schedule
     *  
     * @var array An array of rounds, in the format of $round => $matchups, 
     *     where each matchup has only two elements with the two teams as 
     *     elements [0] and [1] or for a $teams array with an odd element count,
     *     may have one of these elements as null to signify a bye for the 
     *     other actual team element in the matchup array
     */
    protected $master = [];

    /**
     * @var array Stores individual team schedules, format of
     *     Schedule::$team[{team}][{round}] = {team2}
     */
    protected $team = [];

    /**
     * Constructor
     * 
     * @see   Schedule::$master
     * @param array $master The master schedule generally generated by the
     *                      make_schedule function
     */
    public function __construct(array $master)
    {
        $this->master = $master;
    }

    /**
     * Get master schedule as array
     * 
     * @see    Schedule::$master
     * @return array
     */
    public function master(): array
    {
        return $this->master;
    }

    /**
     * Generates all team schedules based on master schedule and stores result
     */
    protected function makeTeam()
    {
        $masterSchedule = $this->master();
        $teamSchedule = [];
        foreach($masterSchedule as $round => $matchups) {
            foreach($matchups as $matchup) {
                $team1 = $matchup[0];
                $team2 = $matchup[1];
                $teamSchedule[$team1][$round] = ['team' => $team2, 'home' => false];
                $teamSchedule[$team2][$round] = ['team' => $team1, 'home' => true];
            }
        }
        $this->team = $teamSchedule;
    }

    /**
     * Get schedule for specific team
     * 
     * @param  mixed $team
     * @return array
     */
    public function forTeam($team): array
    {
        if(empty($this->team)) {
            $this->makeTeam();
        }
        return array_key_exists($team, $this->team) ? $this->team[$team] : [];
    }

    /**
     * Get all scheduled teams
     * 
     * @return array
     */
    public function teams(): array
    {
        if(empty($this->team)) {
            $this->makeTeam();
        }
        return array_filter(array_keys($this->team));
    }

    /**
     * Returns master schedule or team schedule if team parameter is not null
     * 
     * @param  mixed $team
     * @return array
     */
    public function get($team = null): array
    {
        if(!is_null($team)) {
            return $this->forTeam($team);
        }
        return $this->master();
    }

    /**
     * Implements IteratorAggregate
     * 
     * Provides ability to iterate over schedule directly from object
     * 
     * @return \Iterator
     */
    final public function getIterator(): Iterator
    {
        return new ArrayIterator($this->master());
    }

    /**
     * Allows returning master or team schedule by invoking object
     * 
     * Will return team schedule if team is not null and exists
     * 
     * @param  mixed $team
     * @return array
     */
    final public function __invoke($team = null): array
    {
        return $this->get($team);
    }

    /**
     * Returns simple string representation of  master schedule
     * 
     * @return string
     */
    public function __toString(): string
    {
        $str = '';
        $master = $this->master();
        foreach($master as $round => $matchups) {
            $str .= "Round {$round}:".PHP_EOL;
            foreach($matchups as $matchup) {
                $str .= ($matchup[0] ?? '*BYE*').' vs. '.($matchup[1] ?? '*BYE*').PHP_EOL;
            }
        }
        return $str;
    }
}
